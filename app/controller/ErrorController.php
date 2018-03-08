<?php
  namespace App\Controller;

  class ErrorController{
    function __construct(){
    }

    public function notFound(){
      echo '404 - Not Found - Tried to get: '.$_GET['path'];
    }
  }
?>
