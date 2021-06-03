<?php

// Define Root
define('BASEPATH', str_replace("\\", "/", realpath(dirname(__FILE__))) . '/');
require_once BASEPATH . 'system/vendor/autoload.php';
// Start
ob_start();
require_once BASEPATH . 'system/start.php';

