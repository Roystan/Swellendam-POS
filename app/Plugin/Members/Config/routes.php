<?php

CroogoRouter::connect('/member', array(
	'plugin' => 'members', 'controller' => 'members', 'action' => 'view', 'member'
));
