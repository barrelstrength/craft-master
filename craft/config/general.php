<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

$customGeneralConfig = array(

	// Triggers
	'cpTrigger' 				=> 'admin',
	'resourceTrigger' 	=> 'resources',
	'actionTrigger' 		=> 'actions',
	'pageTrigger' 			=> 'p',

	// Manage our routes in the craft/config/routes.php file
	'siteRoutesSource' 	=> 'file',

);

// Merge any environment-specific custom config settings 
if (is_array($customEnvironmentConfig = @include(CRAFT_CONFIG_PATH . ENV . '/general.php')))
{
	$customGeneralConfig = array_merge($customGeneralConfig, $customEnvironmentConfig);
}

return $customGeneralConfig;