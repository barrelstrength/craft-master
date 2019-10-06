# Craft Master

Craft Master is a starter project for Craft CMS.

## Setup

To create a new project:

```
composer create-project barrelstrength/craft-master <path>
```

Follow the Craft CMS docs [Installation Instructions](https://docs.craftcms.com/v3/installation.html) as appropriate.

----

To get setup with a Craft CMS project using Craft Master:

1. Clone the repository to your local environment
2. Copy `.env.example` => `.env` and add your `ENVIRONMENT` and database connection info
3. Copy `config/local/general.example.php` => `config/local/general.php` and update as desired

## Context

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
    - Updates `web/index.php` to include `.multienv.php` and dynamically set the `ENVIRONMENT` and `SITE_URL` variables
    - Updates `.env` settings  in `config/db.php` to use multi-environment config and fallback to default settings if being used with application level configuration
- Updates `config/general.php` to:
    - Sets `env`, `baseCpUrl`, `siteUrl`, and `@web` alias dynamically
    - Updates `defaultSearchTermOptions` to allow fuzzy searches
    - Sets `tokenParam` to use `t`
    - Updates `securityKey` to support both `.env` or fallback to a value defined in `config/general.php`
    - Sets `userSessionDuration`, `rememberedUserSessionDuration`, and `rememberUsernameDuration` to one month 
    - Updates `config/general.php` to support a local override file `config/local/general.php` that can be excluded from the repo
    - Adds default `config/local/general.php` with extended login times and several development considerations
- Updated default Redactor Configs 
    - Simple - Bold-Italic.json
    - Content - No Headings.json
    - Content - H2-H3.json   
- Adds a front-end login form for users when a site is offline via `templates/503.twig`
- Adds `CraftTwigAutoCompleteExtension.php`

## Considerations

### Tracking changes in the repository

Craft Master prefers to keep all project files in the repository and includes the `vendor` folder to track and deploy changes.

### Dynamic environment variables

Craft Master updates `web/index.php` to include `config/multienv.php` which adds support for defining the `ENVIRONMENT` and `SITE_URL` variables as part of the web request. The `ENVIRONMENT` and `SITE_URL` variables are used in the `config/general.php` file to help define several other settings.

### Site URL and @web

The Site URL setting is used in several places and can be defined in the `.env` file on a per-environment basis.  

Alternatively, Craft Master will dynamically set the `SITE_URL` variable if no Site URL is defined in the `.env` file. This is done using the `$_SERVER['HTTP_HOST']` variable. If you choose this method, be sure your application is using an environment where `$_SERVER['HTTP_HOST']` can be trusted. If you are unsure, play it safe and define your Site URL using `.env`.

Alongside these conventions, Craft Master sets the `@web` alias dynamically, to help avoid an undesired side effects (such as cache poisoning) if `@web` is used with its default behavior. 

### Databases

The default `config/db.php` has been updated to work in concert with `.env` so it's easier to use the recommended Craft `.env` alongside alternative workflows without the need to define some variables multiple times. 

For local development, define your database credentials in the `.env`. In other environments, you can choose to use `.env` or a multi-environment application configuration.