<?php

CroogoCache::config('croogo_blocks', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('blocks'))
));

Croogo::hookComponent('*', array(
	'Blocks.Blocks' => array(
		'priority' => 5,
	)
));

Croogo::hookHelper('*', 'Blocks.Regions');

if (Configure::read('Site.live')):
    CroogoNav::add('blocks', array(
            'icon' => array('columns', 'large'),
            'title' => __d('croogo', 'Blocks'),
            'url' => array(
                    'admin' => true,
                    'plugin' => 'blocks',
                    'controller' => 'blocks',
                    'action' => 'index',
            ),
            'weight' => 30,
            'children' => array(
                    'blocks' => array(
                            'title' => __d('croogo', 'Blocks'),
                            'url' => array(
                                    'admin' => true,
                                    'plugin' => 'blocks',
                                    'controller' => 'blocks',
                                    'action' => 'index',
                            ),
                    ),
                    'regions' => array(
                            'title' => __d('croogo', 'Regions'),
                            'url' => array(
                                    'admin' => true,
                                    'plugin' => 'blocks',
                                    'controller' => 'regions',
                                    'action' => 'index',
                            ),
                    ),
            ),
    ));
endif;