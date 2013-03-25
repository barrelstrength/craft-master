<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

$customGeneralConfig = array(

);

// Merge any environment-specific custom config settings 
if (is_array($customEnvironmentConfig = require_once(CRAFT_CONFIG_PATH . ENVIRONMENT . '/general.php')))
{
	$customGeneralConfig = array_merge($customGeneralConfig, $customEnvironmentConfig);
}

return $customGeneralConfig;