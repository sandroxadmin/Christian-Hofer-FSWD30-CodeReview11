<?php
namespace App\Controller;
use App\Model\Car;
use App\Model\Office;
use App\Model\User;
use App\Controller\UserController;



class OfficeController{
  function __construct(){
    session_start();
  }

  public function showMapWidthAllOffices(){
    require('config/route.conf.php');
    if(!UserController::isLoggedIn()){
      header('Location: .');
    }
    include('config\api.conf.php');
    $param['googleMapsKey'] = $googleMapsKey;
    $param['centerLat'] = '48.209594';
    $param['centerLng'] = '16.370269';
    $head['title'] = 'Office Location Map';
    $body['content'] = 'app/view/OfficeView.php';
    $office = new Office;
    $officeArray = $office->getAll();
    $param['officeArray'] = $officeArray;
    for($i = 0; $i < count($officeArray); $i++){
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$officeArray[$i]->streetName.'+'.$officeArray[$i]->streetNumber.'+Vienna+Austria&key='.$googleMapsKey;
        $json = json_decode(file_get_contents($url));
        $officeArray[$i]->atitude = $json->results[0]->geometry->location->lat;
        $officeArray[$i]->longtitute = $json->results[0]->geometry->location->lng;
        $officeArray[$i]->fullAddress = $json->results[0]->formatted_address;
    }
    $param['officeLocationJson'] = json_encode($officeArray);
    include('app/view/template.php');
  }
}




 ?>
