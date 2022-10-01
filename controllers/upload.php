<?php
require(__ROOT__.'/controllers/Controller.php');

class UploadActivityController extends Controller{
    
    public function post($request){
        $this->render('apropos',[$request['firstname'],$request['lastname']]);
    }
}
?>
