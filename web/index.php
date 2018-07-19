<?php

// Set Environment
switch ($_SERVER['HTTP_HOST']) {
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

// Set Scheme
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    ## Support proxy SSL
    define('URI_SCHEME', $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://');
}
else if (isset($_SERVER['HTTPS'])) {
    ## Standard SSL support
    define('URI_SCHEME', 'https://');
}
else {
    ## Standard without SSL
    define('URI_SCHEME', 'http://');
}

// Set Site URL
define('SITE_URL', URI_SCHEME . $_SERVER['HTTP_HOST'] . '/');

// Set path constants
define('CRAFT_BASE_PATH', dirname(__DIR__));
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');

// Load Composer's autoloader
require_once CRAFT_VENDOR_PATH.'/autoload.php';

// Load and run Craft
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/web.php';
$app->run();
