<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 */

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

define('SITE_URL', URI_SCHEME . $_SERVER['HTTP_HOST'] . '/');

// Do we still need this? Use volums.php for assets now...
define('BASEPATH', realpath(CRAFT_BASE_PATH . '/../') . '/');

return [
    // Global settings
    '*' => [

        // Assume devMode is disabled. Override in .env: `DEV_MODE = true`
        'devMode' => false,
        
        // Assume isSystemOn is disabled. Override in .env: `IS_SYSTEM_ON = true`
        'isSystemOn' => false,

        // Assume `backupOnUpdate` is enabled. Override in .env: `BACKUP_ON_UPDATE = false`
        'backupOnUpdate' => getenv('BACKUP_ON_UPDATE') === 'false' ?? true,

         // Assume template caching is disabled. Override in .env: `ENABLE_TEMPLATE_CACHING = true`
        'enableTemplateCaching' => getenv('ENABLE_TEMPLATE_CACHING') === 'true' ?? false,

        // Override in .env: `TEST_TO_EMAIL_ADDRESS = 'youremail@website.com'
        'testToEmailAddress' => getenv('TEST_TO_EMAIL_ADDRESS'),
        
        // Create an ENV variable we can use in our Twig Templates
        'env' => getenv('ENVIRONMENT'),

        // Make it easier to stay logged in. Override in general.php 'production' environment
        'elevatedSessionDuration'       => 'P101Y',
        'userSessionDuration'           => 'P101Y',
        'rememberedUserSessionDuration' => 'P101Y',
        'rememberUsernameDuration'      => 'P101Y',
        'invalidLoginWindowDuration'    => 'P101Y',
        'cooldownDuration'              => 'PT1S',
        'maxInvalidLogins'              => 101,

        // Removed support for the `environmentVariables` config setting. Use the `siteUrl` config setting in `config/general.php` to set the site URL, and override volume settings with `config/volumes.php`.        
        'siteUrl' => [
            'en_us' => SITE_URL
        ],

        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 0,

        // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
        'enableCsrfProtection' => true,

        // Whether "index.php" should be visible in URLs
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => getenv('SECURITY_KEY'),

        // Enable wildcard search by default
        'defaultSearchTermOptions' => [
            'subLeft'  => true,
            'subRight' => true
        ],
    ],

    // Production environment settings
    'production' => [
        
        'isSystemOn' => true,

        // Enable template caching. Override development default.
        'enableTemplateCaching' => true,

        // Override development defaults with Craft defaults
        'elevatedSessionDuration'       => 300,
        'userSessionDuration'           => 'PT1H',
        'rememberedUserSessionDuration' => 'P2W',
        'rememberUsernameDuration'      => 'P1Y',
        'invalidLoginWindowDuration'    => 'PT1H',
        'cooldownDuration'              => 'PT5M',
        'maxInvalidLogins'              => 5,
    ],
];
