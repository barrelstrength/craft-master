<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

// Ensure our urls have the right scheme
define('URI_SCHEME',  ( isset($_SERVER['HTTPS'] ) ) ? "https://" : "http://" );

// The site url
define('SITE_URL',    URI_SCHEME . $_SERVER['SERVER_NAME'] . '/');

// The site basepath
define('BASEPATH', 	  realpath(dirname(__FILE__) . '/../') . '/');

$customConfig = array(
	
  // ------------------------------------------------------------
	// Environment: All
  // ------------------------------------------------------------ 
  '*' => array(

    // Environmental variables
    // We can use these variables in the URL and Path settings 
    // within the Craft Control Panel. For example:
    //    siteUrl   can be references as {siteUrl}
    //    basePath  can be references as {basePath} 
  	'environmentVariables' => array(
  	  'basePath' => BASEPATH,
      'siteUrl'  => SITE_URL
  	),

    // Triggers
    'cpTrigger' 		  => 'admin',
    'resourceTrigger' => 'resources',
    'actionTrigger' 	=> 'actions',
    'pageTrigger' 		=> 'p',

    // Member login info duration
    // http://www.php.net/manual/en/dateinterval.construct.php
    'userSessionDuration'           => 'P1M',
    'rememberedUserSessionDuration' => 'P1M',
    'rememberUsernameDuration'      => 'P1M',

    // User account related paths
    'loginPath'              => 'login',
    'logoutPath'             => 'logout',
    'setPasswordPath'        => 'setpassword',
    'setPasswordSuccessPath' => '',
    'activateAccountPath'    => 'activate',
    'activateFailurePath'    => '',

    // Manage our routes in the craft/config/routes.php file
    // 'siteRoutesSource'   => 'file',
	),

  // ------------------------------------------------------------
  // Environment: Development
  // ------------------------------------------------------------
	'dev' => array(

    // Give us more useful error messages
    'devMode' => true,
    
    // Route ALL of the emails that Craft
    // sends to a single email address. 
    'testToEmailAddress'  => '',

    'translationDebugOutput'      => false,
    'useCompressedJs'             => true,
    'cacheDuration'               => 'P1D',
    'cooldownDuration'            => 'PT5M',
    'maxInvalidLogins'            => 5,
    'invalidLoginWindowDuration'  => 'PT1H',
    'phpMaxMemoryLimit'           => '256M',

    // Member login info duration
    // http://www.php.net/manual/en/dateinterval.construct.php
    'userSessionDuration'           => 'P101Y',
    'rememberedUserSessionDuration' => 'P101Y',
    'rememberUsernameDuration'      => 'P101Y',

  )

);

// If a local config file exists, merge any local config settings 
if (is_array($customLocalConfig = @include(CRAFT_CONFIG_PATH . 'local/general.php')))
{
  $customGlobalConfig = array_merge($customConfig['*'], $customLocalConfig);
  $customConfig['*'] = $customGlobalConfig;
}

return $customConfig;