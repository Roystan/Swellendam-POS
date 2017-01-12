<?php

// Contact
CroogoRouter::connect('/spouse', array(
	'plugin' => 'spouses', 'controller' => 'spouses', 'action' => 'view', 'spouse'
));
