<?php

CroogoRouter::connect('/report', array(
	'plugin' => 'reports', 'controller' => 'reports', 'action' => 'view', 'report'
));
