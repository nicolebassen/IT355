<?php
date_default_timezone_set('MST');

setlocale(LC_MONETARY, 'en_US');

defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', 'localhost');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'baseball');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'root');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', 'root');

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

defined('INCLUDE_PATH') ? NULL : define('INCLUDE_PATH', SITE_ROOT.'includes'.DS);
defined('FUNCTION_PATH') ? NULL : define('FUNCTION_PATH', INCLUDE_PATH.'functions'.DS);
defined('LIB_PATH') ? NULL : define('LIB_PATH', INCLUDE_PATH.'libraries'.DS);
defined('MODEL_PATH') ? NULL : define('MODEL_PATH', INCLUDE_PATH.'models'.DS);
defined('VIEW_PATH') ? NULL : define('VIEW_PATH', INCLUDE_PATH.'views'.DS);

require_once(FUNCTION_PATH.'Functions.php');
require_once(LIB_PATH.'Database.php');
require_once(MODEL_PATH.'Stats.php');