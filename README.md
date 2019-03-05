# Craft Master

Craft Master is a starter project for Craft CMS. 

Craft provides a framework for configuring a project across multiple environments using environment variables (at the infrastructure level) and multi-environment configs (within the application). Craft Master is designed to work out of the box with the recommended Craft configuration and add flexibility to support a broader range of application configurations.

Craft Master updates the default Craft starter project in the following ways:

- Adds .editorconfig
- Updates .gitignore
    - Includes `vendor` folder
    - Excludes several common editor configurations and misc files
    - Excludes additional items used in development and build scripts
    - Excludes the Craft `storage` folder (excluding `storage/rebrand`)
    - Excludes local configuration files
- Updates default environment conventions to assume three environments: `local`, `dev`, `production`    
    - Updates `.env` to use `local` as the default `ENVIRONMENT` variable
- Enhances support for application-level configuration
    - Updates `web/index.php` to include `.multienv.php` 
    - Adds support for dynamically setting the Craft Environment and Site URL in `.multienv.php` 
    - Updates `config/general.php` to support a local override `config/local/general.php` that can be excluded from the repo
    - Adds default `config/local/general.php` with extended login times and several development considerations
    - Updates `config/db.php` to assume multiple environments and support both `.env` and multi-environment config workflows
- Updates `config/general.php` to:
    - dynamically set SITE_URL
    - dynamically set baseCpUrl
    - dynamically set @web
    - various other config preferences
    - Support using a Security Key in .env or via Multi-Env
    - Allow overrides in a config/local/general.php file.
- Updated default Redactor Configs
    - Simple - Bold-Italic.json
    - Content - No Headings.json
    - Content - H2-H3.json   
- Adds a 503 page that includes a login form

## Considerations

### Tracking changes in the repository

Craft Master prefers to keep all project files in the repository and includes the `vendor` folder to track and deploy changes.

### Dynamic environment variables

Craft Master updates `web/index.php` to include `.multienv.php` which adds support for defining the `ENVIRONMENT` and `SITE_URL` variables as part of the web request. The `ENVIRONMENT` and `SITE_URL` variables are used in the `config/general.php` file to help define several other settings.

### Site URL and @web

The Site URL setting is used in several places and can be defined in the `.env` file on a per-environment basis.  

Alternatively, Craft Master will dynamically set the `SITE_URL` variable if no Site URL is defined in the `.env` file. This is done using the `$_SERVER['HTTP_HOST']` variable. If you choose this method, be sure your application is using an environment where `$_SERVER['HTTP_HOST']` can be trusted. If you are unsure, play it safe and define your Site URL using `.env`.

Alongside these conventions, Craft Master sets the `@web` alias dynamically, to help avoid an undesired side effects (such as cache poisoning) if `@web` is used with its default behavior. 

### Databases

The default `config/db.php` has been updated to work in concert with `.env` so it's easier to use the recommended Craft `.env` alongside alternative workflows without the need to define some variables multiple times. 

For local development, define your database credentials in the `.env`. In other environments, you can choose to use `.env` or a multi-environment application configuration.

## Setup

To setup a Craft project using Craft Master in your local environment, pull down the repository and:

1. Copy `.env.example` => `.env` and your `ENVIRONMENT` and database connection info
2. Copy `config/local/general.example.php` => `config/local/general.php` and update as desired





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



Some articles on conventions:
https://security.stackexchange.com/questions/199248/why-use-env-whats-wrong-with-storing-secrets-in-a-config-php-file-outside-roo
https://security.stackexchange.com/questions/191590/why-is-storing-passwords-in-version-control-a-bad-idea

Where people can hack your site?
- Codebase
- Server logins
- Exploiting User Logins
- Exploiting codebase/database

What information can they get?
- Personal Info, Secret keys, Passwords

How can they use that
- Try to manipulate or trick a person
- Try to use keys and passwords.

Types of sites and what you can actually do if you hack things?
- Marketing sites. Get some random person's login and cause trouble. No real personal info to worry about. Just anoyo-hacks.
- E-Commerce. Actual personal info. Purchase stuff.
- User Databases: personal info.
