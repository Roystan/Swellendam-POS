<?php

CroogoCache::config('accounts_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('accounts'))
));

CroogoNav::add('accounts', array(
	'icon' => array('user', 'large'),
	'title' => __d('croogo', 'Accounts'),
	'url' => array(
		'admin' => true,
		'plugin' => 'accounts',
		'controller' => 'accounts',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'accounts' => array(
			'title' => __d('croogo', 'Accounts'),
			'url' => array(
				'admin' => true,
				'plugin' => 'accounts',
				'controller' => 'accounts',
				'action' => 'index',
			),
		),
	),
));

