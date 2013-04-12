<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

$dbCustomConfig = array(
	'tablePrefix' 	=> 'craft'
);

// Merge environment-specific db info
if (is_array($dbEnvironmentConfig = @include(CRAFT_CONFIG_PATH . ENV . '/db.php')))
{
	$dbCustomConfig = array_merge($dbCustomConfig, $dbEnvironmentConfig);
}

return $dbCustomConfig;
