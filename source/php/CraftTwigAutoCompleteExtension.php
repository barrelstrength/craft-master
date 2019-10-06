<?php
/**
 * CraftTwigAutoCompleteExtension for Craft CMS 3.x
 *
 * CraftTwigAutoCompleteExtension is a utility class that can be used with Craft CMS
 * and PhpStorm to enable auto-complete behavior in your Twig templates.
 *
 * Usage:
 * 1. Enable the [Symfony Support](https://plugins.jetbrains.com/plugin/7219-symfony-support) plugin in your PhpStorm project:
 * Preferences → Languages & Frameworks → PHP → Symfony. Select Enable Plugin for this Project.
 * 2. Place this file somewhere in your project that can be indexed by PhpStorm (This file is included in Barrel Strength's Craft Master Starter project)
 * 3. Enjoy code completion of the supported Craft APIs or configure your own
 *
 * Big thanks to nystudio107 for originally documenting this in the article:
 * https://nystudio107.com/blog/auto-complete-craft-cms-3-apis-in-twig-with-phpstorm
 */

namespace barrelstrength\craft;

use barrelstrength\sproutforms\web\twig\variables\SproutFormsVariable;
use barrelstrength\sproutseo\web\twig\variables\SproutSeoVariable;
use craft\commerce\elements\Order;
use craft\commerce\elements\Product;
use craft\commerce\models\LineItem;
use craft\commerce\web\twig\CraftVariableBehavior;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;
use craft\elements\Tag;
use craft\elements\User;
use craft\models\Site;
use craft\web\twig\variables\CategoryGroups;
use craft\web\twig\variables\Config;
use craft\web\twig\variables\Cp;
use craft\web\twig\variables\CraftVariable;
use craft\web\twig\variables\Deprecator;
use craft\web\twig\variables\ElementIndexes;
use craft\web\twig\variables\EntryRevisions;
use craft\web\twig\variables\Feeds;
use craft\web\twig\variables\Fields;
use craft\web\twig\variables\Globals;
use craft\web\twig\variables\I18N;
use craft\web\twig\variables\Io;
use craft\web\twig\variables\Request;
use craft\web\twig\variables\Routes;
use craft\web\twig\variables\Sections;
use craft\web\twig\variables\SystemSettings;
use craft\web\twig\variables\UserSession;
use craft\web\View;
use DateTime;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Class CraftTwigAutoCompleteVariable extends the Craft Variable and adds
 * properties that represent the classes that are loaded by Craft dynamically.
 * Several common classes are supported by default and you can add additional
 * support for plugins or modules that you use in your project.
 *
 * @property Cp                  $cp
 * @property Io                  $io
 * @property Routes              $routes
 * @property CategoryGroups      $categoryGroups
 * @property Config              $config
 * @property Deprecator          $deprecator
 * @property ElementIndexes      $elementIndexes
 * @property EntryRevisions      $entryRevisions
 * @property Feeds               $feeds
 * @property Fields              $fields
 * @property Globals             $globals
 * @property I18N                $i18n
 * @property Request             $request
 * @property Sections            $sections
 * @property SystemSettings      $systemSettings
 * @property UserSession         $session
 *
 * // Craft Commerce
 * @mixin CraftVariableBehavior
 *
 * // Sprout Plugins
 * @property SproutFormsVariable $sproutForms
 * @property SproutSeoVariable $sproutSeo
 */
class CraftTwigAutoCompleteVariable extends CraftVariable
{
    // Add @property
}

/**
 * Class CraftTwigAutoCompleteExtension provides a utility class that will be indexed
 * for PhpStorm to index so that we get Intellisense auto-complete in our Twig templates.
 */
class CraftTwigAutoCompleteExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        return [
            // Craft Variable
            'craft' => new CraftTwigAutoCompleteVariable(),

            // Craft Constants
            'SORT_ASC' => 4,
            'SORT_DESC' => 3,
            'SORT_REGULAR' => 0,
            'SORT_NUMERIC' => 1,
            'SORT_STRING' => 2,
            'SORT_LOCALE_STRING' => 5,
            'SORT_NATURAL' => 6,
            'SORT_FLAG_CASE' => 8,
            'POS_HEAD' => 1,
            'POS_BEGIN' => 2,
            'POS_END' => 3,
            'POS_READY' => 4,
            'POS_LOAD' => 5,

            // Misc. Craft Globals
            'currentUser' => new User(),
            'currentSite' => new Site(),
            'devMode' => true,
            'isInstalled' => true,
            'loginUrl' => '',
            'logoutUrl' => '',
            'now' => new DateTime(),
            'systemName' => '',
            'siteName' => '',
            'siteUrl' => '',
            'view' => new View(),

            // Use common names for these individual Elements for auto-completion

            // Craft Elements
            'asset' => new Asset(),
            'category' => new Category(),
            'entry' => new Entry(),
            'tag' => new Tag(),

            // Commerce Elements
            'lineItem' => new LineItem(),
            'order' => new Order(),
            'product' => new Product(),
        ];
    }
}
