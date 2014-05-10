
# Craft Master
Craft Master is designed to be a set of base templates and starter code for Craft CMS.  It is not meant to be used as is, but as a starting place for several different possible goals. 

If you are looking for a basic Team Multi-Environment config, you may want to check out the more simple [Craft Multi-Environment Config](https://github.com/BarrelStrength/Craft-Multi-Environment-Config).

Craft Master includes:

## Multi-environment Config
We've updated Craft to run comfortably in any environment that we send it to.  A few changes have to be made to the primary index.php file and to the environment-specfic config and database files, and then you can work on localhost, staging, dev, production, or wherever else you fancy.

- Added test for environment to /public/index.php
- Override and define CRAFT_ENVIRONMENT variable in index.php
- Added `craft/config/local` folder for local config settings
- Added example general.php and db.php in `craft/config/local`
- Updated /craft/config/general.php to merge in environment specific config settings
- Updated /craft/config/db.php to merge in environment specific database settings
- Set URI_SCHEME, SITE_URL, and BASEPATH variables in /craft/config/general.php
- Moved some config overrides to /craft/config/general.php for easier access
	- Added environmentVariables 'siteUrl'  => SITE_URL
	- Added environmentVariables 'basePath' => BASEPATH
- Added some config overrides to general.php in local and dev environments
	dev
	- Set devMode to true
	local
	- Set devMode to true
	- Make it easier to access testToEmailAddress
	- Make it easier to access some config settings useful for debugging
		phpMaxMemoryLimit, backupDbOnUpdate, translationDebugOutput,
		useCompressedJs, cacheDuration
  - Set several member login settings to 101 years
  	userSessionDuration, rememberedUserSessionDuration, 
  	rememberUsernameDuration, invalidLoginWindowDuration
  - Set cooldownDuration to 1 second
  - Set maxInvalidLogins to 101

## Customizable .htaccess
We've added a handful of things to our base .htaccess file. Since many rules require certain server settings to be turned on and may throw errors if they are not, all rules except the default Craft .htaccess rules are commented out by default. You can enable them as you choose to in your own environment.

- Redirect public access to an offline page while updates are being made
- Password protect a single environment
- Set proper MIME type for all files
- Set gzip compression rules
- Set Expires headers
- ETag removal
- Remove www from beginning of URL
- Force www at beginning of URL
- Force SSL when using dashboard
- Remove trailing slashes from end of URL
- Prevent 404 errors for non-existing redirected folders
- Set UTF-8 encoding
- Add various security enhancements
- Relative 301 redirects that will work in any environment
- Remove index.php from the URL'


