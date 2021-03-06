<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Database Seeders
    |--------------------------------------------------------------------------
    |
    | Configuration for generating data for test.
    |
    */
    'seeders' => [
        'test' => [
            'common_config' => [
                'created_at' => '01-01-2020',
            ],
            'user' => [
                'amount_simple_users' => env('AMOUNT_SIMPLE_TEST_USERS', 100000),
                'amount_deleted_users' => env('AMOUNT_DELETED_TEST_USERS', 100000),
            ],
            'task' => [
                'amount_simple_tasks' => env('AMOUNT_SIMPLE_TEST_TASKS', 25000),
                'amount_parent_tasks' => env('AMOUNT_PARENT_TEST_TASKS', 25000),
                'amount_deleted_tasks' => env('AMOUNT_DELETED_TEST_TASKS', 50000),
                'demo_task' => [
                    'amount_nested' => env('AMOUNT_NESTED_FOR_DEMO_TASK', 3),
                    'amount_children_for_nested' => env('AMOUNT_CHILDREN_FOR_NESTED_DEMO_TASK', 2),
                ],
            ],
            'task_template' => [
                'amount_simple_templates' => env('AMOUNT_SIMPLE_TEST_TASK_TEMPLATES', 25000),
                'amount_parent_templates' => env('AMOUNT_PARENT_TEST_TASK_TEMPLATES', 25000),
                'amount_deleted_templates' => env('AMOUNT_DELETED_TEST_TASK_TEMPLATES', 50000),
                'demo_template' => [
                    'amount_nested' => env('AMOUNT_NESTED_FOR_DEMO_TASK_TEMPLATE', 3),
                    'amount_children_for_nested' => env('AMOUNT_CHILDREN_FOR_NESTED_DEMO_TASK_TEMPLATE', 2),
                ],
            ],
            'task_comment' => [
                'amount_tasks_per_chunk' => env('AMOUNT_TASKS_PER_CHUNK_FOR_TEST_TASK_COMMENT_SEEDER', 100),
                'amount_comments_for_every_task' => env('AMOUNT_TEST_COMMENTS_FOR_EVERY_TEST_TASK', 1),
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Id of user for test
    |--------------------------------------------------------------------------
    |
    | Id of user for test this application. Use in seeders which create test data.
    |
    */
    'test_user_id' => env('TEST_USER_ID'),
];
