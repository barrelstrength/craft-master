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
        'env'     => CRAFT_ENVIRONMENT,
        'siteUrl' => SITE_URL,
        'aliases' => [
            '@svg' => CRAFT_BASE_PATH . '/web/assets/svgs'
        ],
        'securityKey' => 'ADD_SECURITY_KEY',

        'devMode' => false,
        'isSystemOn' => false,
        'allowUpdates' => false,
        'backupOnUpdate' => false,
        'enableTemplateCaching' => false,
        'generateTransformsBeforePageLoad' => true,
        'omitScriptNameInUrls' => true,

        'tokenParam' => 't',
        'defaultSearchTermOptions' => [
            'subLeft'  => true,
            'subRight' => true
        ],

        // Member login info duration
        // http://www.php.net/manual/en/dateinterval.construct.php
        'userSessionDuration'           => 'P1M',
        'rememberedUserSessionDuration' => 'P1M',
        'rememberUsernameDuration'      => 'P1M',
    ],

    // Production Environment
    'production' => [
        'isSystemOn' => true,
        'enableTemplateCaching' => true
    ],

    // Dev Environment
    'dev'   => [
        'isSystemOn' => false,
        'devMode' => true,
        'enableTemplateCaching' => false,
    ],

    // Local Environment
    'local' => [
        'isSystemOn' => true,
        'allowUpdates' => true,
        'devMode' => true,
        'backupOnUpdate' => true,
    ]
];

// If a local config file exists, merge any local config settings
if (is_array($customLocalConfig = @include(CRAFT_BASE_PATH . '/config/local/general.php')))
{
  $customGlobalConfig = array_merge($customConfig['*'], $customLocalConfig);
  $customConfig['*'] = $customGlobalConfig;
}

return $customConfig;
