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
                $this->render('connect_info', [$user[0] -> getlName(), $user[0] -> getfName()]);
        } 
    } else{
            $this->render('connect_info',[null,null]);
        }
        
    }
}
?>
