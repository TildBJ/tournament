<?php
namespace Dennis\Tournament\Domain\Repository;

/**
 * Description of the class 'Tournament1on1Repository.php'
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 */

/**
 * Class Event1on1Repository
 *
 * @package Dennis\Tournament\Domain\Repository
 */
class Event1on1Repository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Get the latest event
	 *
	 * @param $uid
	 * @return object
	 */
	public function getLatestEvent($uid) {
		$query = $this->createQuery();

		$query->matching(
			$query->equals('tournament1on1', $uid)
		);
		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));

		return $query->execute()->getFirst();
	}

	/**
	 * Get all events since a selected Uid
	 *
	 * @param $uid
	 * @param $id
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function getUntilUid($uid, $id) {
		$query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->equals('tournament1on1', $uid),
				$query->lessThanOrEqual('sorting', $id)
			)
		);

		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));

		return $query->execute();
	}
}
