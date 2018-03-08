<?php
namespace App\Controller;
use App\Model\Car;
use App\Model\Office;


class CarController{
  function __construct(){
    session_start();
  }

  public function showMapWidthAllCars(){
    require('config/route.conf.php');
    if(!UserController::isLoggedIn()){
      header('Location: .');
    }
    include('config\api.conf.php');
    $param['googleMapsKey'] = $googleMapsKey;
    $param['centerLat'] = '48.209594';
    $param['centerLng'] = '16.370269';
    $head['title'] = 'Car Location Map';
    $body['content'] = 'app/view/CarView.php';
    $car = new Car;
    $carArray = $car->getAll();
    $param['carArray'] = $carArray;
    $param['carLocationJson'] = json_encode($carArray);
    include('app/view/template.php');
  }
}




 ?>
