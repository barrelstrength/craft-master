
# Craft Multi-Environment

A custom, multi-environment setup for Craft CMS.

## Multi-environment Config

Out of the box Craft supports config files for multiple environments. See [Multi-Environment Configs](https://craftcms.com/docs/multi-environment-configs) in the Craft docs. 

This setup is a simple customization of the default multi-environment setup and is meant to serve as an example and starting point for others who may be interested in customizing their Craft setups a bit more.  If you are interested in a more advanced custom setup, see [Craft-Master](https://github.com/BarrelStrength/Craft-Master).

This custom multi-environment setup does three things:

1. Adds support for siteUrl and basePath variables that can be used in the URL and Path settings in the Craft Control panel
2. Moves several config overrides into the /craft/config/general.php file for easier access and enables a few useful settings for development
3. Adds support for multiple local environments (which may be useful for teams)

Here is a list of all the updates that have been made:

- Updated /craft/config/general.php to merge in environment specific config settings if a local config file exists at /craft/config/local/general.php
- Updated /craft/config/db.php to merge in environment specific database settings if a local database settings file exists at /craft/config/local/db.php
- Added example files general.example.php and db.example.php in the /craft/config/local folder.  To setup a local configuration these example files can be renamed general.php and db.php and updated with any custom settings necessary for your local environment.
- Defined URI_SCHEME, SITE_URL, and BASEPATH to build siteUrl and basePath environmentVariables
- Added several config overrides to general.php in local and dev environments
  - Increase logged in user session duration to 101 years
  - Set devMode to true
