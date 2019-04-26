<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

$customConfig = [

    // All Environments
    '*' => [

        // Environment
        'env' => CRAFT_ENVIRONMENT,
        'baseCpUrl' => SITE_URL,
        'siteUrl' => SITE_URL,

        // Paths
        'aliases' => [
            '@web' => SITE_URL
        ],

        // Application
        'defaultSearchTermOptions' => [
            'subLeft' => true,
            'subRight' => true
        ],
        'omitScriptNameInUrls' => true,
        'securityKey' => getenv('SECURITY_KEY') ?: 'ADD_SECURITY_KEY',
        'tokenParam' => 't',

        // Users
        // http://www.php.net/manual/en/dateinterval.construct.php
        'userSessionDuration' => 'P1M',
        'rememberedUserSessionDuration' => 'P1M',
        'rememberUsernameDuration' => 'P1M',
    ],

    // Production Environment
    'production' => [

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
