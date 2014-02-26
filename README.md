
# Craft Master
A custom, multi-environment setup for Craft CMS.

## Multi-environment Config
We've updated Craft to run comfortably in any environment that we send it to.  A few changes have to be made to the primary index.php file and to the environment-specfic config and database files, and then you can work on localhost, staging, dev, production, or wherever else you fancy.

- Moved system folder above web root
- Added test for environment to /public_html/index.php
- Define environment variable in index.php
- Move plugin folder to just above web root for easier access
- Move template folder to just above web root for easier access
- Added folders for default environments: local, dev, live
- Added copies of general.php and db.php in each environment folder
- Updated /craft/config/general.php to merge in environment specific config settings
- Updated /craft/config/db.php to merge in environment specific database settings
- Moved some config overrides to /craft/config/general.php for easier access
- Added some config overrides to general.php in local and dev environments
  - Increase logged in user session duration to 101 years
  - Set devMode to true


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
- Example code to setup relative 301 redirects that will work in any environment
- Remove index.php from the URL
