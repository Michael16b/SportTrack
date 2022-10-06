<?php
require(CONTROLLERS_DIR.'/Controller.php');

class DisconnectUserController extends Controller{

    public function get($request){
        session_destroy();
        $this->render('user_disconnect',[]);
    }
}
?>
