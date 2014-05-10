<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * View the default settings here craft/app/etc/config/defaults/general.php
 */

// Ensure our urls have the right scheme
define('URI_SCHEME',  ( isset($_SERVER['HTTPS'] ) ) ? "https://" : "http://" );

// The site url
define('SITE_URL',    URI_SCHEME . $_SERVER['SERVER_NAME'] . '/');

// The site basepath
define('BASEPATH', 	  realpath(CRAFT_BASE_PATH . '/../') . '/');

$customConfig = array(
	
  // ------------------------------------------------------------
	// Environment: All
  // ------------------------------------------------------------ 
  '*' => array(

    // This is a value that we can append to all
    // css and js files to cachebust them all if we need to.
    // 'cacheBustValue'    => '20121017',

    // The environment we set in index.php: live, dev, or local
    // {% if craft.config.env == 'live' %}
    // 'env' => CRAFT_ENVIRONMENT,

    // We can use these variables in the URL and Path settings within
    // the Craft Control Panel.  i.e. siteUrl => {siteUrl}, basePath => {basePath} 
  	'environmentVariables' => array(
  	  'siteUrl'  => SITE_URL,
      'basePath' => BASEPATH
  	),

    // Triggers
    // 'cpTrigger'       => 'admin',
    // 'pageTrigger'     => 'p',

    // User account related paths
    // 'loginPath'                   => 'members',
    // 'logoutPath'                  => 'logout',
    // 'setPasswordPath'             => 'members/set-password',
    // 'setPasswordSuccessPath'      => 'members',
    // 'activateAccountSuccessPath'  => 'members?activate=success',
    // 'activateAccountFailurePath'  => 'members?activate=fail',
	),
  
  // ------------------------------------------------------------
  // Environment: Dev
  // ------------------------------------------------------------
  'live' => array(

    // Allow auto-updates on the live site?
    // 'allowAutoUpdates' => true,

  ),

  // ------------------------------------------------------------
  // Environment: Dev
  // ------------------------------------------------------------
	'dev' => array(

    'devMode' => true,

  )

);

// If a local config file exists, merge any local config settings 
if (is_array($customLocalConfig = @include(CRAFT_CONFIG_PATH . 'local/general.php')))
{
  $customGlobalConfig = array_merge($customConfig['*'], $customLocalConfig);
  $customConfig['*'] = $customGlobalConfig;
}

return $customConfig;