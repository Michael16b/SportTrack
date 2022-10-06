<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/UserDAO.php');
require(__ROOT__.'/model/User.php');

class AddUserController extends Controller{

    public function get($request){
        $this->render('user_update_form',[]);
    }

    public function post($request){
        if ($_SESSION) {
            $mailExist = UserDAO::getInstance()->findMail($request['mail']);
            if ($mailExist == $_SESSION['mail']) {
                $mailExist = false;
            }
            if (!$mailExist) {  
            $this->render('user_update_valid',['surname' => $request['surname'], 
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
        UserDAO::getInstance()->update($user);

        $_SESSION['surname'] =  $request['surname'];
        $_SESSION['name'] =  $request['name'];
        $_SESSION['date'] =  $request['date'];
        $_SESSION['gender'] =  $request['gender'];
        $_SESSION['size'] =  $request['size'];
        $_SESSION['weight'] =  $request['weight'];
        $_SESSION['mail'] =  $request['mail'];
        $_SESSION['password'] =  $request['password'];
        } else {
            $this->render('error',['Le mail existe déjà, veuillez choisir une autre adresse mail']);
            }
        } else {
            $this->render('user_connect_form',[]); 
        }
    }
}
?>
