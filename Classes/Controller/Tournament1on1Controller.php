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
class Tournament1on1Controller extends TournamentController implements Tournament1on1Interface {

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
	 * @var string
	 */
	protected $feOutput;

	/**
	 * initializeAction
	 */
	public function initializeAction() {
		parent::initializeAction();
		$this->setFeOutput($this->settings['FEoutput']);

		if (!$this->feOutput) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Pleas select an Item to show');
		}
	}

	/**
	 * indexAction
	 *
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @return void
	 */
	public function indexAction() {
		$events = $this->event1on1Repository->findAll();

		$outputs = explode(',', $this->feOutput);
		foreach ($outputs as $output) {
			if ($output == 'encounter') {
				$this->view->assign('events', $events);
			} elseif ($output == 'table') {
				// @Todo: Find a better solution for currentPage
				$widget = array('currentPage' => 0);
				if ($this->request->hasArgument('@widget_0')) {
					$widget = $this->request->getArgument('@widget_0');
				}
				$this->view->assign('rows', $this->generateTable($this->tournamentId, $events->offsetGet($widget['currentPage'])));
			} else {
				throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Invalid Item');
			}
		}
	}

	/**
	 * Main function for the Table View
	 *
	 * @param int $tournamentId
	 * @param \Dennis\Tournament\Domain\Model\Event1on1 $currentEvent
	 * @return mixed
	 */
	protected function generateTable($tournamentId, $currentEvent) {
		$this->tournamentSettings = $this->tournament1on1Repository->findByUid($tournamentId);

		if ($currentEvent) {
			$teams = $this->tournament1on1Repository->findByUid($tournamentId)->getPlayer();
			$table = array();

			foreach ($teams as $team) {

				$this->encounters = $this->encounter1on1Repository->getEncounters($team, $currentEvent->getUid());

				/** @var $team Player1on1 */
				$team->setCountGames($this->encounter1on1Repository->countGames($team, $currentEvent->getUid()))
					->setVictories($this->countVictories($team, $currentEvent->getUid()))
					->setDraws($this->countDraws($team, $currentEvent->getUid()))
					->setDefeats($this->countDefeats($team, $currentEvent->getUid()))
					->setGoals($this->countGoals($team, $currentEvent->getUid()))
					->setGoalsAgainst($this->countGoalsAgainst($team, $currentEvent->getUid()));

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
	 * Sets the feOutput
	 *
	 * @param $feOutput
	 * @return void
	 */
	public function setFeOutput($feOutput) {
		$this->feOutput = $feOutput;
	}
}
