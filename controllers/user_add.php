<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/UserDAO.php');
require(__ROOT__.'/model/User.php');

class AddUserController extends Controller{

    public function get($request){
        $this->render('user_add_form',[]);
    }

    public function post($request){
        $allUsers = UserDAO::getInstance()->findAll();
        $mailExist = false;
        foreach ($allUsers as $user) {
            if ($user->getMail() == $request['mail']) {
                $mailExist = true;
            }
        }
        if (!$mailExist) {  
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
            } else {
                $this->render('error',['Le Mail existe déjà, veuillez choisir une autre adresse mail']);
            }
    }
    
}
?>
