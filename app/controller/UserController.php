<?php
namespace App\Controller;
use App\Model\AbstractModel;
use App\Model\User;
use App\View\LoginFormView;


class UserController{
  function __construct(){
      session_start();
  }
  public function login(){
    $viewParam = Array();
    if(!$this->isLoggedIn()){
      if(isset($_POST['email']) && isset($_POST['password'])){
        $user = new User();
        $user = $user->getUserByEmail($_POST['email']);

        if($user != NULL && password_verify($_POST['password'], $user->passwordHash)){
          $_SESSION['user_id'] = $user->userId;
        }
      }
    }else{

    }
    header('Location: .');
  }

  public static function isLoggedIn(){
    return isset($_SESSION['user_id']) ? true : false;
  }
}




 ?>
