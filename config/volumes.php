<?php
/**
 * Asset Volumes Configuration
 *
 * See Aliases:
 * https://github.com/craftcms/docs/blob/v3/en/configuration.md#aliases
 *
 * @web = Base URL to where /index.php exists
 * @webroot = Base path to where /index.php exists
 * @root = Project root path = CRAFT_BASE_PATH
 */

return [

    // All environments
    '*' => [
	    'assets' => [
	        'path' => '@webroot/assets/subfolder',
	        'url' => '@web/assets/subfolder'
	    ]
	  ]
];
