<?php
namespace Module\Routing;

class Route{
  public $path;
  public $name;
  public $controller;
  public $function;
  public $method;

  function __construct(String $path, String $name, String $controller, String $function, String $method){
    $this->path = $path;
    $this->name = $name;
    $this->controller = $controller;
    $this->function = $function;
    $this->method = $method;
  }
}

?>
