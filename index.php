<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});
use Module\Routing\Router;
$router = isset($_GET['path']) ?  new Router($_GET['path'], $_SERVER['REQUEST_METHOD']) : new Router('index', 'GET');
$router->loadRoute();
?>
