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
class TournamentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController implements TournamentInterface {

	/**
	 * @var $tournamentId
	 */
	public $tournamentId;

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @return void
	 */
	public function initializeAction() {
		$this->setTournamentId($this->settings['tournament1on1']);

		if (!$this->tournamentId) {
			throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Please select a tournament');
		}
	}

	/**
	 * Sets the TournamentId
	 *
	 * @param $tournamentId
	 * @return void
	 */
	public function setTournamentId($tournamentId) {
		$this->tournamentId = $tournamentId;
	}

}
