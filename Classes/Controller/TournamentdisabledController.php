<?php
namespace Dennis\Tournament\Controller;

/**
 * Description of the class 'Tournament1on1Controller.php'
 *
 * @author Dennis Römmich <dennis@roemmich.eu>
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 */

/**
 * Class TournamentdisabledController
 *
 * @package Dennis\Tournament\Controller
 */
class TournamentdisabledController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Main Function if no Type was selected
	 *
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @return void
	 */
	public function indexAction() {
		throw new \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException('Please select a tournament type');
	}

}
