<?php

CroogoCache::config('paymentlogs_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('paymentlogs'))
));
