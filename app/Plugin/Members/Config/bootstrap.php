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
CroogoCache::config('members_view', array_merge($cacheConfig, array(
	Configure::read('Cache.defaultConfig'),
	'groups' => array('members', 'payments'),
)));

CroogoNav::add('members', array(
	'icon' => array('group', 'large'),
	'title' => __d('croogo', 'Members'),
	'url' => array(
		'admin' => true,
		'plugin' => 'members',
		'controller' => 'members',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'members' => array(
			'title' => __d('croogo', 'Members'),
			'url' => array(
				'admin' => true,
				'plugin' => 'members',
				'controller' => 'members',
				'action' => 'index',
			),
			'weight' => 10,
		),
                'spouses' => array(
			'title' => __d('croogo', 'Spouses'),
			'url' => array(
				'admin' => true,
				'plugin' => 'spouses',
				'controller' => 'spouses',
				'action' => 'index',
			),
			'weight' => 10,
		),
                'dependants' => array(
			'title' => __d('croogo', 'Dependants'),
			'url' => array(
				'admin' => true,
				'plugin' => 'dependants',
				'controller' => 'dependants',
				'action' => 'index',
			),
			'weight' => 10,
		),
	),
));
