<?php

/**
 * Dynamic Site Routes
 *
 * If you’d prefer to set up your site routes here as opposed to Settings > Routes in the CP,
 * you need to open up craft/config/general.php and add this to your config array:
 *
 *     'siteRoutesSource' => 'file',
 *
 * With that in place, Craft will check this file instead of the DB.
 *
 * Each route will take up one element in the array returned by this file.
 * The array keys are your URL patterns, and the values are the templates that should get loaded.
 *
 * The URL patterns are regular expressions. If you want to capture portions of the URL and
 * make them available to your template, use named subpatterns. For example:
 *
 *     'blog/archive/(?P<year>\d{4})' => 'blog/_archive',
 *
 * That example would match URIs such as "blog/archive/2012", and pass the request along to
 * the blog/_archive template, providing it a ‘year’ variable set to the value “2012”.
 */

return array(

);
