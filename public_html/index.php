<?php

// Path to your craft/ folder
$craftPath = '../craft';

// Setup environment-friendly configs
switch ($_SERVER['HTTP_HOST']) {		
	case 'domain.com' :
		$environment = 'live';
		break;

	case 'dev.domain.com' :
		$environment = 'dev';
		break;

	default :
		$environment = 'local';
		break;
}

// Set environment
define('ENVIRONMENT', $environment);

// Set config path to current environment
define('CRAFT_CONFIG_PATH', realpath("{$craftPath}/config").'/');

// Move plugins path to right above web root
define('CRAFT_PLUGINS_PATH', realpath(dirname(__FILE__) . "/../plugins").'/');

// Move templates path to right above web root
define('CRAFT_TEMPLATES_PATH', realpath(dirname(__FILE__) . "/../templates").'/');


// Do not edit below this line
$path = rtrim($craftPath, '/').'/app/index.php';

if (!is_file($path))
{
	exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in '.__FILE__);
}

require_once $path;
