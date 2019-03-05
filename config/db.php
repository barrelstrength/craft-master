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
        'server' => getenv('DB_SERVER') ?: 'localhost',
        'port' => getenv('DB_PORT') ?: '3306',
        'user' => getenv('DB_USER') ?: '',
        'password' => getenv('DB_PASSWORD') ?: '',
        'database' => getenv('DB_DATABASE') ?: '',
        'schema' => getenv('DB_SCHEMA') ?: 'public',
        'tablePrefix' => getenv('DB_TABLE_PREFIX') ?: '',
    ],

    // Production Environment
    //'production' => [
    //    'server'   => 'localhost',
    //    'user'     => '',
    //    'password' => '',
    //    'database' => ''
    //],

    // Dev Environment
    //'dev' => [
    //    'server'   => 'localhost',
    //    'user'     => '',
    //    'password' => '',
    //    'database' => '',
    //]
];
