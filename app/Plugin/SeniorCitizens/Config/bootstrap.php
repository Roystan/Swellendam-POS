<?php

/**
 * Failed login attempts
 *
 * Default is 5 failed login attempts in every 5 minutes
 */
$cacheConfig = array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('senior_citizens'))
);
CroogoCache::config('senior_citizens_view', array_merge($cacheConfig, array(
	Configure::read('Cache.defaultConfig'),
	'groups' => array('senior_citizens', 'payments'),
)));

CroogoNav::add('senior_citizens', array(
	'icon' => array('group', 'large'),
	'title' => __d('croogo', 'Senior Citizens'),
	'url' => array(
		'admin' => true,
		'plugin' => 'senior_citizens',
		'controller' => 'senior_citizens',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'senior_citizens' => array(
			'title' => __d('croogo', 'Senior Citizens'),
			'url' => array(
				'admin' => true,
				'plugin' => 'senior_citizens',
				'controller' => 'senior_citizens',
				'action' => 'index',
			),
			'weight' => 10,
		),
	),
));
