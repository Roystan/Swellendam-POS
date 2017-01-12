<?php

CroogoCache::config('croogo_menus', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('menus'))
));

Croogo::hookComponent('*', 'Menus.Menus');

Croogo::hookHelper('*', 'Menus.Menus');

if (Configure::read('Site.live')):
    CroogoNav::add('menus', array(
            'icon' => array('sitemap', 'large'),
            'title' => __d('croogo', 'Menus'),
            'url' => array(
                    'admin' => true,
                    'plugin' => 'menus',
                    'controller' => 'menus',
                    'action' => 'index',
            ),
            'weight' => 20,
            'children' => array(
                    'menus' => array(
                            'title' => __d('croogo', 'Menus'),
                            'url' => array(
                                    'admin' => true,
                                    'plugin' => 'menus',
                                    'controller' => 'menus',
                                    'action' => 'index',
                            ),
                            'weight' => 10,
                    ),
                    'add_new' => array(
                            'title' => __d('croogo', 'Add new'),
                            'url' => array(
                                    'admin' => true,
                                    'plugin' => 'menus',
                                    'controller' => 'menus',
                                    'action' => 'add',
                            ),
                            'weight' => 20,
                            'htmlAttributes' => array('class' => 'separator'),
                    ),
            ),
    ));
endif;
