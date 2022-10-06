<?php
require(CONTROLLERS_DIR.'/Controller.php');
require(__ROOT__.'/model/UserDAO.php');
require(__ROOT__.'/model/User.php');

class DisconnectUserController extends Controller{

    public function get($request){
        if ($_SESSION) {
            $user = new User();
            $user -> init($_SESSION['surname'],$_SESSION['name'],$_SESSION['date'],$_SESSION['gender'],$_SESSION['size'],$_SESSION['weight'],$_SESSION['mail'],$_SESSION['password']);
            UserDAO::getInstance()->delete($user);
            session_destroy();
            $this->render('user_delete',[]);
        } else {
            $this->render('error',["Vous n'êtes pas connecté"]); 
        }
    }
}
?>
