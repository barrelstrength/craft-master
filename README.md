# Craft Master

- Base Craft Install

With these opinionated changes:

- Added .editorconfig
- Added .gitattributes
- Updated .gitignore
- Updated .env file has been simplified to only manage the variables necessary for console requests. This is primarily needed for console commands in our workflow, and is only necessary in environments where you wish to run console commands. We also default to a local environment called 'local', however this can be updated to whatever your local environment naming preference is.
  ENVIRONMENT="local"
  URI_SCHEME
  HTTP_HOST
- Adds support for application-level config
    - Updates config/general.php and config/db.php to support environments
    - Adds config/local for local configuration of general.php and db.php files
    - Default local config with extended login times and devMode on
- Update index.php to define the CRAFT_ENVIRONMENT for web requests
- Update general.php to define URI_SCHEME and SITE_URL
- Updated default Redactor Configs
    - Simple - Bold-Italic.json
    - Content - No Headings.json
    - Content - H2-H3.json   
    
----

BSD Script
    Removes web.config files
    Add security token to general.php
    Add top level htaccess and configures any above web root basepath behavior.

Run this script after setup:
    '@web' => SITE_URL,
    '@webroot' => CRAFT_BASE_PATH. '/web',
    Do we need to set baseCpUrl too?

Can we have a post install script that just grabs a config.json file we post as a Gist and runs through several predefined arrays:
    deleteFiles
    moveFiles
    findReplaceValuesInFiles
I think we may need to redefine @web and @webroot based on the one-level up home folder configuration we have

Have a helper module/class to help update arrays in config files
	->updateArray('file.php', 'arrayKey', 'valueToReplace')
	may need a few of these to handle replacing values vs adding to associative sub arrays.. or just arrays
		'modules' => [
		    'my-module' => \modules\Module::class,
		    'my-new-module' => \modules\Module::class,
		],
		'bootstrap' => ['my-module', 'my-new-module'],
		'securityKey' => 'ADD_SECURITY_KEY',
	And we can include this module as the first dependency in our project.


We don't exclude the vendor folder in gitignore.