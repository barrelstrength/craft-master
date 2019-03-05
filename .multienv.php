<?php

if (!getenv('ENVIRONMENT')) {
    // Set Environment Variable `ENVIRONMENT` for web requests
    switch ($_SERVER['HTTP_HOST']) {
        case 'www.website.com' :
        case 'website.com' :
            putenv('ENVIRONMENT=production');
            break;
        case 'dev.website.com' :
            putenv('ENVIRONMENT=dev');
            break;
        default :
            putenv('ENVIRONMENT=local');
            break;
    }
}

// Set Scheme
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    ## Support proxy SSL
    define('URI_SCHEME', $_SERVER['HTTP_X_FORWARDED_PROTO'].'://');
} else if (isset($_SERVER['HTTPS'])) {
    ## Standard SSL support
    define('URI_SCHEME', 'https://');
} else {
    ## Standard without SSL
    define('URI_SCHEME', 'http://');
}

// Set Site URL
if ($siteUrl = getenv('SITE_URL')) {
    define('SITE_URL', $siteUrl);
} else {
    define('SITE_URL', URI_SCHEME.$_SERVER['HTTP_HOST'].'/');
}
