<?php

$this->extend('/Common/admin_index');
$this->Html
	->addCrumb(__d('croogo', 'Dashboard'), array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'), array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Payments'), '/' . $this->request->url)
	
?>
