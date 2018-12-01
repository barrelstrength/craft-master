<?php
/**
 * Craft web bootstrap file
 */

// Console requests can define HTTP_HOST in the .env file
$httpHost = getenv('HTTP_HOST') ?: $_SERVER['HTTP_HOST'];
define('HTTP_HOST', $httpHost);

// Set Scheme
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    ## Support proxy SSL
    define('URI_SCHEME', $_SERVER['HTTP_X_FORWARDED_PROTO'].'://');
} else if (isset($_SERVER['HTTPS'])) {
    ## Standard SSL support
    define('URI_SCHEME', 'https://');
} else {
    ## Standard without SSL
    define('URI_SCHEME', getenv('URI_SCHEME') ?: 'http://');
}

// Set Site URL
define('SITE_URL', URI_SCHEME.HTTP_HOST.'/');

// Set Environment for web requests
switch (HTTP_HOST) {
    case 'www.website.com' :
    case 'website.com' :
        define('CRAFT_ENVIRONMENT', 'production');
        break;
    case 'dev.website.com' :
        define('CRAFT_ENVIRONMENT', 'dev');
        break;
    default :
        define('CRAFT_ENVIRONMENT', 'local');
        break;
}

// Default Craft Config
// ------------------------------------------------------------

// Set path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';

// Load dotenv?
if (file_exists(CRAFT_BASE_PATH.'/.env')) {
    (new Dotenv\Dotenv(CRAFT_BASE_PATH))->load();
}

// Load and run Craft
define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'production');
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();
