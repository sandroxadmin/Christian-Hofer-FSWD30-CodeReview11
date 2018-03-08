<?php
namespace App\Model;
use App\Model\AbstractModel;

class User extends AbstractModel{

  private $tableName = 'user';
  public $userId;
  public $firstName;
  public $surname;
  public $email;
  public $password;
  public $passwordHash;



  public function getUserByEmail($email){
    $sql = "SELECT * FROM `user` WHERE `email` = '".$email."'";
    if($result = mysqli_query($this->conn, $sql)) {
        if($result->num_rows == 1){
          $row = mysqli_fetch_assoc($result);
          $user = new User();
          $user->userId = $row['user_id'];
          $user->email = $row['email'];
          $user->passwordHash = $row['password_hash'];
          return $user;
        }
    }else{
      return null;
    }
  }
  public function validate(){
    
  }

  public function save(){
    $this->hashPassword();
    $sql = "INSERT INTO ".$this->tableName."(`first_name`, `surname`, `email`, `password_hash`) VALUES ('".$this->firstName."', '".$this->surname."', '".$this->email."', '".$this->passwordHash."')";
    echo $sql;
    if (mysqli_query($this->conn, $sql)) {
        echo "Insert successfully! \n";
        die();
    } else {
        echo "Error Insert " . mysqli_error($this->conn);
        die();
    }
    mysqli_close($this->conn);
  }
  public function hashPassword(){
    $this->passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
  }
}
 ?>
