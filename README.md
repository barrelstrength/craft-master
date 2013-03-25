
# Craft Master
A custom, multi-environment setup for Craft CMS.

## Custom .htaccess
We've added a handful of things to our base .htaccess file. This assumes certain server settings are turned on and may throw errors if they are not.  If that sounds like a headache, you may just want to roll with the default .htaccess provided by Craft.

- Example code to redirect public access to an offline page while updates are being made
- Example code to password protect a single environment
- Set proper MIME type for all files
- Set gzip compression rules
- Set Expires headers
- ETag removal
- Remove www from URL
- Example code to remove trailing slashes from URL
- Prevent 404 errors for non-existing redirected folders
- Set UTF-8 encoding
- Add various security enhancements
- Example code to setup relative 301 redirects that will work in any environment
- Remove index.php from the URL

## Multi-environment Config
We've updated Craft to run comfortably in any environment that we send it to.  A few changes have to be made to the primary index.php file and to the environment-specfic config and database files, and then you can work on localhost, staging, dev, production, or wherever else you fancy.

- Moved system folder above web root
- Added test for environment to /public_html/index.php
- Define environment variable in index.php
- Move plugin folder to just above web root for easier access
- Move template folder to just above web root for easier access
- Added folders for default environents: local, dev, live
- Added copies of general.php and db.php in each environment folder
- Updated /craft/config/general.php to merge in environment specific config settings
- Updated /craft/config/db.php to merge in environment specific database settings