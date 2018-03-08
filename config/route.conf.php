<?php
use Module\Routing\Route;
$routeBaseDir = '//Christian-Hofer-FSWD30-CodeReview11/';
$routeArray = Array();

//new Route(String $path, String $name, String $controller, String $function, String $transportMethod)
$routeArray[] = new Route('index', 'index', 'IndexController', 'showIndex', 'GET');
$routeArray[] = new Route('login', 'login', 'UserController', 'login', 'POST');
$routeArray[] = new Route('car', 'map', 'CarController', 'showMapWidthAllCars', 'GET');
$routeArray[] = new Route('office', 'map', 'OfficeController', 'showMapWidthAllOffices', 'GET');
$routeArray[] = new Route('404', '404', 'ErrorController', 'notFound', 'GET');
?>
