<?php
namespace Dennis\Tournament\Domain\Repository;

use \Dennis\Tournament\Domain\Model\Player1on1;

/**
 * Description of the class 'Encounter1on1Repository.php'
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 */

/**
 * Class Encounter1on1Repository
 *
 * @package Dennis\Tournament\Domain\Repository
 */
class Encounter1on1Repository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Count all games of a team
	 *
	 * @param Player1on1 $team
	 * @param $uid
	 * @return int
	 */
	public function countGames(Player1on1 $team, $uid) {
		$query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->logicalOr(
					$query->equals('player_home', $team->getUid()),
					$query->equals('player_guest', $team->getUid())
				),
				$query->equals('pid', $team->getPid()),
				$query->lessThanOrEqual('event1on1', $uid)
			)

		);

		return $query->execute()->count();
	}

	/**
	 * Get all encounters
	 *
	 * @param Player1on1 $team
	 * @param $uid
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function getEncounters(Player1on1 $team, $uid) {
		$query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->logicalOr(
					$query->equals('player_home', $team->getUid()),
					$query->equals('player_guest', $team->getUid())
				),
				$query->equals('pid', $team->getPid()),
				$query->lessThanOrEqual('event1on1', $uid)
			)
		);

		return $query->execute();
	}
}
