<?php

/**
 * Failed login attempts
 *
 * Default is 5 failed login attempts in every 5 minutes
 */
$cacheConfig = array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('users'))
);
CroogoCache::config('reports_view', array_merge($cacheConfig, array(
	Configure::read('Cache.defaultConfig'),
	'groups' => array('members', 'spouses'),
)));

CroogoNav::add('reports', array(
	'icon' => array('book', 'large'),
	'title' => __d('croogo', 'Reports'),
	'url' => array(
		'admin' => true,
		'plugin' => 'reports',
		'controller' => 'reports',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'export_csv' => array(
			'title' => __d('croogo', 'Export CSV'),
			'url' => array(
				'admin' => true,
				'plugin' => 'reports',
				'controller' => 'reports',
				'action' => 'export_csv_view',
			),
			'weight' => 10,
		),
	),
));
