<?php

CroogoCache::config('dependants_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('dependants'))
));

/*CroogoNav::add('dependants', array(
	'icon' => array('user', 'large'),
	'title' => __d('croogo', 'Dependants'),
	'url' => array(
		'admin' => true,
		'plugin' => 'dependants',
		'controller' => 'dependants',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'dependants' => array(
			'title' => __d('croogo', 'Dependants'),
			'url' => array(
				'admin' => true,
				'plugin' => 'dependants',
				'controller' => 'dependants',
				'action' => 'index',
			),
		),
	),
));*/