<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/UserDAO.php');
require(__ROOT__.'/model/User.php');

class AddUserController extends Controller{

    public function get($request){
        $this->render('user_add_form',[]);
    }

    public function post($request){
        $this->render('user_add_valid',['surname' => $request['surname'], 
                                        'name' => $request['name'],
                                        'date' => $request['date'],
                                        'gender' => $request['gender'],
                                        'size' => $request['size'],
                                        'weight' => $request['weight'],
                                        'mail' => $request['mail'],
                                        'password' => $request['password']
                                    ]);


    $user = new User();
    $user -> init($request['surname'],$request['name'],$request['date'],$request['gender'],$request['size'],$request['weight'],$request['mail'],$request['password']);
    UserDAO::getInstance()->insert($user);  
    }
    
}
?>
