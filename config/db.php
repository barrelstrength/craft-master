<?php
/**
 * Database Configuration
 *
 * All of your system's database connection settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/DbConfig.php.
 *
 * @see craft\config\DbConfig
 */

return [

    // All Environments
    '*' => [
        'driver' => getenv('DB_DRIVER') ?: 'mysql',
        'dsn' => getenv('DB_DSN') ?: '',
        'user' => getenv('DB_USER') ?: '',
        'password' => getenv('DB_PASSWORD') ?: '',
        'schema' => getenv('DB_SCHEMA') ?: 'public',
        'tablePrefix' => getenv('DB_TABLE_PREFIX') ?: '',
    ],

    // Production Environment
    //'production' => [
    //    'dsn'   => '',
    //    'user'     => '',
    //    'password' => ''
    //],

    // Dev Environment
    //'dev' => [
    //    'dsn'   => '',
    //    'user'     => '',
    //    'password' => ''
    //]
];
