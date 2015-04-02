<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Dennis.' . $_EXTKEY,
	'Pi1',
	array(
		'Tournament1on1' => 'index',
	),
	// non-cacheable actions
	array(

	)
);
