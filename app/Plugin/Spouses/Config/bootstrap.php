<?php

CroogoCache::config('spouses_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('spouses'))
));

/*CroogoNav::add('spouses', array(
	'icon' => array('user', 'large'),
	'title' => __d('croogo', 'Spouses'),
	'url' => array(
		'admin' => true,
		'plugin' => 'spouses',
		'controller' => 'spouses',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'spouses' => array(
			'title' => __d('croogo', 'Spouses'),
			'url' => array(
				'admin' => true,
				'plugin' => 'spouses',
				'controller' => 'spouses',
				'action' => 'index',
			),
		),
	),
));*/

