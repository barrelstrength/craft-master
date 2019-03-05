<?php
/**
 * General Configuration
 *
 * See configuration options:
 * vendor/craftcms/cms/src/config/GeneralConfig.php
 */

$customConfig = [

    // All Environments
    '*' => [

        // Development Defaults
        'devMode' => false,
        'enableTemplateCaching' => false,
        'isSystemOn' => false,
        'useProjectConfigFile' => true,

        'env' => CRAFT_ENVIRONMENT,
        'siteUrl' => SITE_URL,
        'baseCpUrl'   => SITE_URL,
        'securityKey' => getenv('SECURITY_KEY') ?: 'ADD_SECURITY_KEY',

        // Paths
        'aliases' => [
            '@web' => SITE_URL
        ],

        // Application
        'allowUpdates' => false,
        'backupOnUpdate' => false,
        'defaultSearchTermOptions' => [
            'subLeft' => true,
            'subRight' => true
        ],

        'omitScriptNameInUrls' => true,
        'tokenParam' => 't',

        // Users
        // http://www.php.net/manual/en/dateinterval.construct.php
        'userSessionDuration' => 'P1M',
        'rememberedUserSessionDuration' => 'P1M',
        'rememberUsernameDuration' => 'P1M',
    ],

    // Production Environment
    'production' => [
        'allowAdminChanges' => false,
        'devMode' => false,
        'enableTemplateCaching' => true,
        'isSystemOn' => true,
    ],

    // Dev Environment
    'dev' => [
        'allowAdminChanges' => false,
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
