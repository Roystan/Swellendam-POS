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
CroogoCache::config('forms_view', array_merge($cacheConfig, array(
	Configure::read('Cache.defaultConfig'),
	'groups' => array('members', 'spouses'),
)));

CroogoNav::add('forms', array(
	'icon' => array('file', 'large'),
	'title' => __d('croogo', 'Application Form'),
	'url' => array(
		'admin' => true,
		'plugin' => 'forms',
		'controller' => 'forms',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'form_eng' => array(
			'title' => __d('croogo', 'English'),
			'url' => array(
				'admin' => true,
				'plugin' => 'forms',
				'controller' => 'forms',
				'action' => 'print_eng_form_view',
			),
			'weight' => 10,
		),
                'form_afr' => array(
			'title' => __d('croogo', 'Afrikaans'),
			'url' => array(
				'admin' => true,
				'plugin' => 'forms',
				'controller' => 'forms',
				'action' => 'print_afr_form_view',
			),
			'weight' => 10,
		),
	),
));
