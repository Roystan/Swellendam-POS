<?php

// Contact
CroogoRouter::connect('/paymentlog', array(
	'plugin' => 'paymentlogs', 'controller' => 'paymentlogs', 'action' => 'view', 'paymentlog'
    
));
