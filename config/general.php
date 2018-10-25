<?php
/**
 * General Configuration
 *
 * See configuration options:
 * vendor/craftcms/cms/src/config/GeneralConfig.php
 */

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

$customConfig = [

    // All Environments
    '*' => [

        // Development Defaults
        'devMode' => false,
        'enableTemplateCaching' => false,
        'isSystemOn' => false,

        // Paths
        'aliases' => [
            '@svg' => CRAFT_BASE_PATH.'/web/assets/svgs'
        ],
        'env' => CRAFT_ENVIRONMENT,
        'siteUrl' => SITE_URL,
        // 'siteUrl' => [
        //     'siteA' => 'https://site-a.com/',
        //     'siteB' => 'https://site-b.com/',
        // ],

        // Application
        'allowUpdates' => false,
        'backupOnUpdate' => false,
        'defaultSearchTermOptions' => [
            'subLeft' => true,
            'subRight' => true
        ],
        'omitScriptNameInUrls' => true,
        'securityKey' => 'ADD_SECURITY_KEY',
        'tokenParam' => 't',

        // Users
        // http://www.php.net/manual/en/dateinterval.construct.php
        'userSessionDuration' => 'P1M',
        'rememberedUserSessionDuration' => 'P1M',
        'rememberUsernameDuration' => 'P1M',
    ],

    // Production Environment
    'production' => [
        'devMode' => false,
        'enableTemplateCaching' => true,
        'isSystemOn' => true,
    ],

    // Dev Environment
    'dev' => [
        'devMode' => true,
        'enableTemplateCaching' => false,
        'isSystemOn' => false,
    ]
];

// If a local config file exists, merge any local config settings
if (is_array($customLocalConfig = @include(CRAFT_BASE_PATH.'/config/local/general.php'))) {
    $customGlobalConfig = array_merge($customConfig['*'], $customLocalConfig);
    $customConfig['*'] = $customGlobalConfig;
}

return $customConfig;
