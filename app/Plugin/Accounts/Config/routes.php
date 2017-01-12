<?php

// Contact
CroogoRouter::connect('/account', array(
	'plugin' => 'accounts', 'controller' => 'accounts', 'action' => 'view', 'account'
));
