<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_tournament_domain_model_encounter1on1'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_tournament_domain_model_encounter1on1']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, duration, team_home_points, team_guest_points, player_home, player_guest',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, duration, --palette--;Einstellungen;encounter'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
		'encounter' => array('showitem' => 'player_home, player_guest, --div--;;;;, team_home_points, team_guest_points', 'canNotCollapse' => 1),
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
				'foreign_table' => 'tx_tournament_domain_model_encounter1on1',
				'foreign_table_where' => 'AND tx_tournament_domain_model_encounter1on1.pid=###CURRENT_PID### AND tx_tournament_domain_model_encounter1on1.sys_language_uid IN (-1,0)',
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

		'duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1.duration',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'team_home_points' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1.team_home_points',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim'
			)
		),
		'team_guest_points' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1.team_guest_points',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim'
			)
		),
		'player_home' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1.player_home',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_tournament_domain_model_player1on1',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'player_guest' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tournament/Resources/Private/Language/locallang_db.xlf:tx_tournament_domain_model_encounter1on1.player_guest',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_tournament_domain_model_player1on1',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),

		'event1on1' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
