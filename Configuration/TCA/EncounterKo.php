<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_tournament_domain_model_encounterko'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_tournament_domain_model_encounterko']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, points_player_home, points_player_guest, player_home, player_guest',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, points_player_home, points_player_guest, player_home, player_guest, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_tournament_domain_model_encounterko',
				'foreign_table_where' => 'AND tx_tournament_domain_model_encounterko.pid=###CURRENT_PID### AND tx_tournament_domain_model_encounterko.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'points_player_home' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounterko.points_player_home',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'points_player_guest' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounterko.points_player_guest',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'player_home' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounterko.player_home',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_tournament_domain_model_playerko',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'player_guest' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounterko.player_guest',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_tournament_domain_model_playerko',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),

		'eventko' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
