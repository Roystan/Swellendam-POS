<?php

CroogoCache::config('titles_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('titles'))
));

CroogoNav::add('titles', array(
	'icon' => array('user', 'large'),
	'title' => __d('croogo', 'Titles'),
	'url' => array(
		'admin' => true,
		'plugin' => 'titles',
		'controller' => 'titles',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'titles' => array(
			'title' => __d('croogo', 'Titles'),
			'url' => array(
				'admin' => true,
				'plugin' => 'titles',
				'controller' => 'titles',
				'action' => 'index',
			),
		),
	),
));

