<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/config/bootstrap.php';


if (!getenv('db_dsn')) {
    putenv('db_dsn=sqlite:///:memory:');
}
Cake\Datasource\ConnectionManager::config('test', [
    'url' => getenv('db_dsn'),
    'timezone' => 'UTC'
]);