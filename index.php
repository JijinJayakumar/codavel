<?php
require_once 'bootstrap.php';
use App\Models\user as users;
$router = new AltoRouter();
$startFunction = "index()";
$rootDir = (strlen($_SERVER['SCRIPT_NAME']) == '1') ? "" : dirname($_SERVER['SCRIPT_NAME']);
$router->setBasePath($rootDir); // remove if in cloud directory
$router->map('GET', '/[a:controller]/[a:action]?', function ($controller, $action = null) {
    $action = $action !== null ? $action : 'index';
    if (isset($controller)) {
        $classurl = 'App\\Controllers\\' . $controller;
        if ((method_exists($classurl, $action))) {
            $class = new $classurl();
            $class->$action();
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            not_found();

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
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    not_found();

}
