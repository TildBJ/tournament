<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "tournament"
 *
 * Auto generated by Extension Builder 2014-09-29
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Tournament Management',
	'description' => 'This plugin allows you to manage tournaments. It supports the 1on1 system. Based on Extbase and Fluid',
	'category' => 'plugin',
	'author' => 'Dennis Römmich',
	'author_email' => 'dennis@roemmich.eu',
	'author_company' => 'sunzinet AG',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '1',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-6.2.99',
			'extbase' => '1.3',
			'fluid' => '1.3',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
