<?php
// Version
define('VERSION', '3.0.0.1');

require_once __DIR__.'/../../vendor/autoload.php';

// Configuration
require_once '../config.php';

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: install/index.php');
	exit;
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('catalog');