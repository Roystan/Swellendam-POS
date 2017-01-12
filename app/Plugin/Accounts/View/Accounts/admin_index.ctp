<?php
$this->Html->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Accounts'), '/' . $this->request->url);

$this->extend('/Common/admin_index');
?>
