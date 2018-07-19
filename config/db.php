<?php
/**
 * Database Configuration
 * Configure all environments
 *
 * See configuration options:
 * vendor/craftcms/cms/src/config/DbConfig.php
 */

$customDbConfig = [

	// All Environments
	'*' => [
		'driver' => 'mysql',
		'port' => '3306',
		'schema' => 'public',
		'tablePrefix' => '',
	],

	// Production Environment
	'production'    => [
		'server'   => 'localhost',
		'user'     => '',
		'password' => '',
		'database' => ''
	],

	// Dev Environment
	'dev'     => [
		'server'   => 'localhost',
		'user'     => '',
		'password' => '',
		'database' => '',
	]
];

## If a local db file exists, merge the local db settings
if (is_array($customLocalDbConfig = @include(CRAFT_BASE_PATH . '/config/local/db.php'))) {
	$customGlobalDbConfig = array_merge($customDbConfig['*'], $customLocalDbConfig);
	$customDbConfig['*']  = $customGlobalDbConfig;
}

return $customDbConfig;
