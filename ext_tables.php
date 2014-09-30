<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Tournament'
);

$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Tournament');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_tournament1on1', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_tournament1on1.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_tournament1on1');
$GLOBALS['TCA']['tx_tournament_domain_model_tournament1on1'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_tournament1on1',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,points_winner,points_loser,points_draw,events,player,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Tournament1on1.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_tournament1on1.png'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_event1on1', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_event1on1.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_event1on1');
$GLOBALS['TCA']['tx_tournament_domain_model_event1on1'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_event1on1',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,date,encounter,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Event1on1.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_event1on1.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_player1on1', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_player1on1.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_player1on1');
$GLOBALS['TCA']['tx_tournament_domain_model_player1on1'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_player1on1',
		'hideTable' => TRUE,
		'label' => 'name',
		'label_userFunc' => 'Dennis\\Tournament\\Utility\\Tca->getPlayer1on1Label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,short_name,icon,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Player1on1.php',
		'iconfile' => ''
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_encounter1on1', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_encounter1on1.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_encounter1on1');
$GLOBALS['TCA']['tx_tournament_domain_model_encounter1on1'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1',
		'hideTable' => TRUE,
		'label' => 'player_home',
		'label_userFunc' => 'Dennis\\Tournament\\Utility\\Tca->getEncounter1on1Label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'duration,team_home_points,team_guest_points,player_home,player_guest,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Encounter1on1.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_encounter1on1.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_tournamentallvsall', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_tournamentallvsall.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_tournamentallvsall');
$GLOBALS['TCA']['tx_tournament_domain_model_tournamentallvsall'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_tournamentallvsall',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,event,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TournamentAllVsAll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_tournamentallvsall.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_eventallvsall', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_eventallvsall.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_eventallvsall');
$GLOBALS['TCA']['tx_tournament_domain_model_eventallvsall'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_eventallvsall',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,number_of_players,player,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/EventAllVsAll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_eventallvsall.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_playerallvsall', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_playerallvsall.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_playerallvsall');
$GLOBALS['TCA']['tx_tournament_domain_model_playerallvsall'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_playerallvsall',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,country,teams,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/PlayerAllVsAll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_playerallvsall.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_countryallvsall', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_countryallvsall.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_countryallvsall');
$GLOBALS['TCA']['tx_tournament_domain_model_countryallvsall'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_countryallvsall',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,short_name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/CountryAllVsAll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_countryallvsall.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_teamallvsall', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_teamallvsall.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_teamallvsall');
$GLOBALS['TCA']['tx_tournament_domain_model_teamallvsall'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_teamallvsall',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TeamAllVsAll.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_teamallvsall.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_tournamentko', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_tournamentko.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_tournamentko');
$GLOBALS['TCA']['tx_tournament_domain_model_tournamentko'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_tournamentko',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,number_of_player,number_of_games_per_set,number_of_sets,event,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/TournamentKo.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_tournamentko.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_eventko', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_eventko.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_eventko');
$GLOBALS['TCA']['tx_tournament_domain_model_eventko'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_eventko',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,date,encounter,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/EventKo.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_eventko.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_encounterko', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_encounterko.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_encounterko');
$GLOBALS['TCA']['tx_tournament_domain_model_encounterko'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounterko',
		'hideTable' => TRUE,
		'label' => 'points_player_home',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'points_player_home,points_player_guest,player_home,player_guest,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/EncounterKo.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_encounterko.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tournament_domain_model_playerko', 'EXT:tournament/Resources/Private/Language/locallang_csh_tx_tournament_domain_model_playerko.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tournament_domain_model_playerko');
$GLOBALS['TCA']['tx_tournament_domain_model_playerko'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_playerko',
		'hideTable' => TRUE,
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/PlayerKo.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tournament_domain_model_playerko.gif'
	),
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_tournament.xml');
