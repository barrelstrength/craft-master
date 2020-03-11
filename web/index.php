<?php
/**
 * Craft web bootstrap file
 */

// Set path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';

// Load dotenv?
if (class_exists('Dotenv\Dotenv') && file_exists(CRAFT_BASE_PATH.'/.env')) {
    Dotenv\Dotenv::create(CRAFT_BASE_PATH)->load();
}

// Add support for defining additional variables
// https://github.com/barrelstrength/craft-master
require CRAFT_BASE_PATH.'/config/multienv.php';

// Load and run Craft
define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();
