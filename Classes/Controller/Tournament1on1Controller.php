<?php
namespace Dennis\Tournament\Controller;

use \Dennis\Tournament\Domain\Model\Player1on1;

/**
 * Description of the class 'Tournament1on1Controller.php'
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 */

/**
 * Class Tournament1on1Controller
 *
 * @package Dennis\Tournament\Controller
 */
class Tournament1on1Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Tournament1on1Repository
	 *
	 * @var \Dennis\Tournament\Domain\Repository\Tournament1on1Repository
	 * @inject
	 */
	public $tournament1on1Repository;

	/**
	 * Encounter1on1Repository
	 *
	 * @var \Dennis\Tournament\Domain\Repository\Encounter1on1Repository
	 * @inject
	 */
	public $encounter1on1Repository;

	/**
	 * Event1on1Repository
	 *
	 * @var \Dennis\Tournament\Domain\Repository\Event1on1Repository
	 * @inject
	 */
	public $event1on1Repository;

	/**
	 * @var $event \Dennis\Tournament\Domain\Model\Event1on1
	 */
	public $event;

	/**
	 * @var $tournamentSettings \Dennis\Tournament\Domain\Model\Tournament1on1
	 */
	public $tournamentSettings;

	/**
	 * @var array|\Dennis\Tournament\Domain\Model\Encounter1on1
	 */
	protected $encounters;

	/**
	 * @param \Dennis\Tournament\Domain\Model\Event1on1 $event
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @return void
	 */
	public function indexAction(\Dennis\Tournament\Domain\Model\Event1on1 $event = NULL) {
		if (!$event) {
			$event = $this->event1on1Repository->getLatestEvent(TournamentController::$uid);
		}

		$this->view->assign('navs', $this->getNavElements());
		$outputs = explode(',', TournamentController::$feOutput);
		foreach ($outputs as $output) {
			if ($output == 'encounter') {
				$this->view->assign('event', $event);
			} elseif ($output == 'table') {
				$this->view->assign('rows', $this->generateTable(TournamentController::$uid, $event));
			} else {
				throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Invalid Item');
			}
		}
	}

	/**
	 * Main function for the Table View
	 *
	 * @param $uid
	 * @param $param
	 * @return mixed
	 */
	protected function generateTable($uid, $param) {
		$this->tournamentSettings = $this->tournament1on1Repository->findByUid($uid);
		$this->event = ($param) ? $param : $this->event1on1Repository->getLatestEvent($uid);

		if ($this->event) {
			$teams = $this->tournament1on1Repository->findByUid($uid)->getPlayer();
			$table = array();

			foreach ($teams as $team) {

				$this->encounters = $this->encounter1on1Repository->getEncounters($team, $this->event->getUid());

				/** @var $team Player1on1 */
				$team->setCountGames($this->encounter1on1Repository->countGames($team, $this->event->getUid()))
					->setVictories($this->countVictories($team, $this->event->getUid()))
					->setDraws($this->countDraws($team, $this->event->getUid()))
					->setDefeats($this->countDefeats($team, $this->event->getUid()))
					->setGoals($this->countGoals($team, $this->event->getUid()))
					->setGoalsAgainst($this->countGoalsAgainst($team, $this->event->getUid()));

				$points = $this->calculatePoints($team);

				$team->setGoalsDifference($this->calculateDifference($team))
					->setPoints($points);
				array_push($table, $team);
			}

			usort($table, array('self', 'sortTable'));

			return $table;
		}

		return FALSE;
	}

	/**
	 * @param Player1on1 $team
	 * @return int $points
	 */
	protected function calculatePoints(Player1on1 $team) {
		$points = (int) 0;
		$points += intval($team->getVictories() * $this->tournamentSettings->getPointsWinner());
		$points += intval($team->getDraws() * $this->tournamentSettings->getPointsDraw());
		$points += intval($team->getDefeats() * $this->tournamentSettings->getPointsLoser());

		return $points;
	}

	/**
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function calculateDifference(Player1on1 $team) {
		$difference = (int) 0;
		$difference += intval($team->getGoals());
		$difference -= intval($team->getGoalsAgainst());

		return $difference;
	}

	/**
	 * includes the sorting rules
	 *
	 * @param Player1on1 $teamA
	 * @param Player1on1 $teamB
	 * @return int
	 */
	protected function sortTable(Player1on1 $teamA, Player1on1 $teamB) {
		if ($teamA->getPoints() == $teamB->getPoints()) {
			if ($teamA->getGoalsDifference() == $teamB->getGoalsDifference()) {
				if ($teamA->getGoals() == $teamB->getGoals()) {
					return 0;
				}
				return ($teamA->getGoals() > $teamB->getGoals()) ? - 1 : + 1;
			}
			return ($teamA->getGoalsDifference() > $teamB->getGoalsDifference()) ? - 1 : + 1;
		}
		return ($teamA->getPoints() > $teamB->getPoints()) ? - 1 : + 1;
	}

	/**
	 * Count all victories of a team
	 *
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function countVictories(Player1on1 $team) {
		$victories = (int) 0;

		/** @var $encounter \Dennis\Tournament\Domain\Model\Encounter1on1 */
		foreach ($this->encounters as $encounter) {
			if ($encounter->getPlayerHome()->getUid() === $team->getUid() AND
					$encounter->getTeamHomePoints() > $encounter->getTeamGuestPoints()) {
				$victories++;
			}
			if ($encounter->getPlayerGuest()->getUid() === $team->getUid() AND
					$encounter->getTeamGuestPoints() > $encounter->getTeamHomePoints()) {
				$victories++;
			}
		}

		return $victories;
	}

	/**
	 * Count all draws of a team
	 *
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function countDraws(Player1on1 $team) {
		$draws = (int) 0;

		/** @var $encounter \Dennis\Tournament\Domain\Model\Encounter1on1 */
		foreach ($this->encounters as $encounter) {
			if ($encounter->getPlayerHome()->getUid() === $team->getUid() AND
					$encounter->getTeamHomePoints() === $encounter->getTeamGuestPoints()) {
				$draws++;
			}
			if ($encounter->getPlayerGuest()->getUid() === $team->getUid() AND
					$encounter->getTeamGuestPoints() === $encounter->getTeamHomePoints()) {
				$draws++;
			}
		}

		return $draws;
	}

	/**
	 * Count all defeats of a team
	 *
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function countDefeats(Player1on1 $team) {
		$defeats = (int) 0;

		/** @var $encounter \Dennis\Tournament\Domain\Model\Encounter1on1 */
		foreach ($this->encounters as $encounter) {
			if ($encounter->getPlayerHome()->getUid() === $team->getUid() AND
					$encounter->getTeamHomePoints() < $encounter->getTeamGuestPoints()) {
				$defeats++;
			}
			if ($encounter->getPlayerGuest()->getUid() === $team->getUid() AND
					$encounter->getTeamGuestPoints() < $encounter->getTeamHomePoints()) {
				$defeats++;
			}
		}

		return $defeats;
	}

	/**
	 * Count all goals of a team
	 *
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function countGoals(Player1on1 $team) {
		$goals = (int) 0;

		/** @var $encounter \Dennis\Tournament\Domain\Model\Encounter1on1 */
		foreach ($this->encounters as $encounter) {
			if ($encounter->getPlayerHome()->getUid() === $team->getUid()) {
				$goals = $goals + $encounter->getTeamHomePoints();
			}
			if ($encounter->getPlayerGuest()->getUid() === $team->getUid()) {
				$goals = $goals + $encounter->getTeamGuestPoints();
			}
		}

		return $goals;
	}

	/**
	 * Count all goals against a team
	 *
	 * @param Player1on1 $team
	 * @return int
	 */
	protected function countGoalsAgainst(Player1on1 $team) {
		$goalsAgainst = (int) 0;

		/** @var $encounter \Dennis\Tournament\Domain\Model\Encounter1on1 */
		foreach ($this->encounters as $encounter) {
			if ($encounter->getPlayerHome()->getUid() === $team->getUid()) {
				$goalsAgainst = $goalsAgainst + $encounter->getTeamGuestPoints();
			}
			if ($encounter->getPlayerGuest()->getUid() === $team->getUid()) {
				$goalsAgainst = $goalsAgainst + $encounter->getTeamHomePoints();
			}
		}

		return $goalsAgainst;
	}

	/**
	 * Get the navigationbar for the view
	 *
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	protected function getNavElements() {
		return $this->event1on1Repository->findAll();
	}
}
