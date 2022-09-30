<?php
require(__ROOT__.'/controllers/Controller.php');

class DisconnectUserController extends Controller{

    public function get($request){
        $this->render('apropos',[]);
        session_destroy();
    }

    public function post($request){
        $this->render('apropos',[$request['firstname'],request['lastname']]);
    }
}
?>
