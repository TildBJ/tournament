<?php
namespace Dennis\Tournament\Controller;

/**
 * Description of the phpfile 'pi1Controller.php'
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 */

/**
 * Class TournamentController
 *
 * @package Dennis\Tournament\Controller
 */
class TournamentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var int $uid
	 */
	public static $uid;

	/**
	 * @var string $feOutput
	 */
	public static $feOutput;

	/**
	 * @var string $tournamentType
	 */
	public static $tournamentType;

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @return void
	 */
	public function initializeAction() {

		static::$uid = $this->settings['tournament1on1'];
		static::$feOutput = $this->settings['FEoutput'];
		static::$tournamentType = $this->settings['tournamentType'];

		if (!self::$uid) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Please select a tournament');
		}

		if (!self::$feOutput) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Pleas select an Item to show');
		}

		if (!self::$tournamentType) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Please select a tournament type');
		}
	}

	/**
	 * Main Function
	 *
	 * @param \Dennis\Tournament\Domain\Model\Event1on1 $event
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
	 * @return void
	 */
	protected function showAction(\Dennis\Tournament\Domain\Model\Event1on1 $event = NULL) {
		$this->forward('index', 'Tournament' . self::$tournamentType, 'tournament', array('event' => $event));
	}

}
