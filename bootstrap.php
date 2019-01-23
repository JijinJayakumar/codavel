<?php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
//configuration 

define('BASE_PATH', "http://localhost/cidavel/codavel/"); //app url
$db['host']="localhost";
$db['database_name']="demo";
$db['user_name']="root";
$db['password']="";



//configuration ends here
$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",

    "host" => $db['host'],

    "database" => $db['database_name'],

    "username" => $db['user_name'],

    "password" => $db['password'],

]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();

spl_autoload_register(function ($className) {

    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    @include_once '' . $className . '.php';

});

function not_found()
{
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/App/Views');
    $twig = new Twig_Environment($loader);
    echo $twig->render('404/index.php', ["base_url" => BASE_PATH]);
    return false;

}
