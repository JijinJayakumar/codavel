<?php
require_once 'bootstrap.php';
use App\Models\user as users;

$router = new AltoRouter();
$router->setBasePath('/codavel'); // remove if thisin base directory

$router->map('GET', '/[a:controller]/[a:action]?', function ($controller, $action = null) {
    $action = $action !== null ? $action : 'Index';
    // if (method_exists($controller, $action)) {
    if (isset($controller)) {
        $classurl = 'App\\Controllers\\' . $controller;
        $class = new $classurl();
        if ((method_exists($classurl, $action))) {
            $class->$action();
        } else {
            echo 'Function missing';

        }
    } else {
        echo 'missing';
    }
});
$match = $router->match();

// call closure or throw 404 status
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    // header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "<b>404 not found</b>";
}
