<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/User.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('connect_form',[]);
    }

    public function post($request){
        $this->render('connect_info',['mail' => $request['mail'], 'password' => $request['password']]);
    }
}

class ConnectUserController extends Controller{

    public function get($request){
        $this->render('connect_form',[]);
        var_dump($COOKIES);
    }

    public function post($request){
        $user = UserDAO::getInstance()->findUser($request['mail'],$request['password']);

        $this->render('connect_info',[$user -> getlName(), $user -> getPassword()]);
    }
}

?>
