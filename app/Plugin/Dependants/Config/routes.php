<?php

// Contact
CroogoRouter::connect('/dependant', array(
	'plugin' => 'dependants', 'controller' => 'dependants', 'action' => 'view', 'dependant'
));
