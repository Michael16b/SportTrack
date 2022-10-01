<?php
require(__ROOT__.'/controllers/Controller.php');

class DisconnectUserController extends Controller{

    public function get($request){
        $this->render('disconnect_info',[]);
        session_destroy();
    }
}
?>
