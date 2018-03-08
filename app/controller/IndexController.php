<?php
namespace App\Controller;
use App\Model\Car;
use App\Model\Office;
use App\Model\User;
use App\Controller\UserController;



class indexController{
  function __construct(){
    session_start();
  }

  public function showIndex(){

    $head['title'] = 'Car Location Map';
    $body['content'] = 'app/view/IndexView.php';
    $param['isLoggedIn'] = UserController::isLoggedIn();
    include('app/view/template.php');
  }
}




 ?>
