<?php

// Contact
CroogoRouter::connect('/payment', array(
	'plugin' => 'payments', 'controller' => 'payments', 'action' => 'view', 'payment'
    
));
