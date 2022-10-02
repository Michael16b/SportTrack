<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/UserDAO.php');
require(__ROOT__.'/model/User.php');


class ConnectUserController extends Controller{

    public function get($request){
        $this->render('connect_form',[]);
        //var_dump($COOKIES);
    }

    public function post($request){
        $user = UserDAO::getInstance()->findUser($request['mail'],$request['password']);
        if($user != null){
            $status = session_status();
            if($status == PHP_SESSION_NONE){
                session_start();

            } else if ($status == PHP_SESSION_ACTIVE){
                session_destroy();
                $_SESSION['user'] = $user;
                session_start();
                $this->render('user_connect_valid', [$user[0] -> getlName(), $user[0] -> getfName()]);
        
            }
        $_SESSION['surname'] =  $user[0] -> getlName();
        $_SESSION['name'] =  $user[0] -> getfName();
        $_SESSION['date'] =  $user[0] -> getBirthDate();
        $_SESSION['gender'] =  $user[0] -> getGender();
        $_SESSION['size'] =  $user[0] -> getSize();
        $_SESSION['weight'] =  $user[0] -> getWeight();
        $_SESSION['mail'] =  $request['mail'];
        $_SESSION['password'] =  $request['password']; 
    } else{
            $this->render('user_connect_valid',[null,null]);
        }
        
    }
}
?>
