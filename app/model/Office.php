<?php
namespace App\Model;
use App\Model\AbstractModel;

class Office extends AbstractModel{

  private $tableName = 'office';
  public $officeId;
  public $streetName;
  public $streetNumber;
  public $countCars;
  public $availableCars;


  public function getAll(){
    $officeArray = Array();
    $sql = 'SELECT *, count(`car`.`car_id`) AS `available_cars` FROM `office` JOIN `car` ON `office`.`office_id` = `car`.`office_id` GROUP BY `office`.`office_id`';
    if ($result = mysqli_query($this->conn, $sql)) {
      while($row = mysqli_fetch_assoc($result)) {
        $office = new Office();
        $office->officeId = $row['office_id'];
        $office->streetName = $row['street_name'];
        $office->streetNumber = $row['street_number'];
        $office->availableCars = $row['available_cars'];
        array_push($officeArray, $office);
      }
    }
    return $officeArray;
  }
}
 ?>
