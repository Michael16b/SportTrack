<?php
require(CONTROLLERS_DIR.'/Controller.php');

class DisconnectUserController extends Controller{

    public function get($request){
        if ($_SESSION) {
            session_destroy();
            $this->render('disconnect_user',[]);
        } else {
            $this->render('error',["Vous n'êtes pas connecté"]); 
        }
    }
}
?>
