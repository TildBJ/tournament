<?php
namespace Dennis\Tournament\Utility;

use \TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Class Tca
 *
 * @package Dennis\Tournament\Utility
 */
class Tca {

	protected $title = '';

	/**
	 * @param $parameters
	 * @return void
	 */
	public function getEncounter1on1Label(&$parameters) {
		$id = $parameters['row']['uid'];
		$items = BackendUtility::getRecord('tx_tournament_domain_model_encounter1on1', $id);
		$playerHome = BackendUtility::getRecord('tx_tournament_domain_model_player1on1', $items['player_home']);
		$playerGuest = BackendUtility::getRecord('tx_tournament_domain_model_player1on1', $items['player_guest']);

		$this->title .= $playerHome['name'] . ' - ';
		$this->title .= $playerGuest['name'] . ' ' . $items['team_home_points'] . ':' . $items['team_guest_points'];
		$parameters['title'] = $this->title;
	}

	/**
	 * @param $parameters
	 * @return void
	 */
	public function getPlayer1on1Label(&$parameters) {
		$id = $parameters['row']['uid'];
		$player = BackendUtility::getRecord('tx_tournament_domain_model_player1on1', $id);
		$this->title .= $player['name'];
		if ($player['short_name']) {
			$this->title .= ' (' . $player['short_name'] . ')';
		}
		$parameters['title'] = $this->title;
	}

}
