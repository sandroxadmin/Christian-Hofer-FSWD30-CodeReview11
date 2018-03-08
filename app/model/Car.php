<?php
namespace App\Model;
use App\Model\AbstractModel;

class Car extends AbstractModel{

  private $tableName = 'car';
  public $carId;
  public $carModelName;
  public $carManufacturer;
  public $atitude;
  public $longtitute;



  public function getAll(){
    $carArray = Array();
    $sql = 'SELECT * FROM `car` JOIN car_model ON `car`.`car_model_id` = `car_model`.`car_model_id` LEFT JOIN location ON `car`.`location_id` = `location`.`location_id` ORDER BY `car_id`';
    if ($result = mysqli_query($this->conn, $sql)) {
      while($row = mysqli_fetch_assoc($result)) {
        $car = new Car();
        $car->carId = $row['car_id'];
        $car->carManufacturer = $row['manufacturer'];
        $car->carModelName = $row['model_name'];
        $car->atitude = $row['atitude'];
        $car->longtitute = $row['longtitute'];
        array_push($carArray, $car);
      }
    }
    return $carArray;
  }

  public function getAllBookedCars(){
    $carArray = Array();
    $sql = 'SELECT * FROM `car` JOIN car_model ON `car`.`car_model_id` = `car_model`.`car_model_id` JOIN location ON `car`.`location_id` = `location`.`location_id` ORDER BY `car_id`';
    if ($result = mysqli_query($this->conn, $sql)) {
      while($row = mysqli_fetch_assoc($result)) {
        $car = new Car();
        $car->carId = $row['car_id'];
        $car->carManufacturer = $row['manufacturer'];
        $car->carModelName = $row['model_name'];
        $car->atitude = $row['atitude'];
        $car->longtitute = $row['longtitute'];
        array_push($carArray, $car);
      }
    }
    return $carArray;
  }
}
 ?>
