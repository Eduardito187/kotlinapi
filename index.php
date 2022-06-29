<?php
require('vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'u960392013_kotlin',
    'username' => 'u960392013_kotlin',
    'password' => 'u960392013_Kotlin',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
require('graphql/boot.php');

?>