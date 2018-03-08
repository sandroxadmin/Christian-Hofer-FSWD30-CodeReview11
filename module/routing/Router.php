<?php
namespace Module\Routing;
use Module\Routing\Route;

class Router{

  public $route;
  public $routeArray;

  public function __construct($path, $method){
    $this->routeArray =  $this->getRouteArray();
    $this->route      =  $this->getRoute($path, $method);
  }

  public function getRouteArray(){
    require('config/route.conf.php');
    return $routeArray;
  }

  public function getRoute($path, $method){
    foreach($this->routeArray as $singleRoute){
      if($singleRoute->path == $path && $singleRoute->method == $method){
        return $singleRoute;
      }
    }
    return $this->getRoute('404', 'GET');
  }

  public static function getAbsolutePathByRouteName($routeName){
    require('config/route.conf.php');
    return $routeBaseDir.$routeName;
  }

  public function loadRoute(){
    $controllerSource = 'App\Controller\\'.$this->route->controller;
    $controller = new $controllerSource;
    $view = $controller->{$this->route->function}();
    return $view;
  }
}

?>
