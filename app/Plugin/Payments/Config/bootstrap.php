<?php

CroogoCache::config('payments_view', array_merge(
	Configure::read('Cache.defaultConfig'),
	array('groups' => array('payments'))
));
