<?php
require(__ROOT__.'/controllers/Controller.php');
require_once (__ROOT__.'/model/Activity.php');
require_once (__ROOT__.'/model/ActivityDAO.php');

class ListActivityController extends Controller{

    public function get($request){
        if ($_SESSION) {
            $lActs = array();
                $allActivities = ActivityDAO::getInstance()->findAll(); 
                foreach ($allActivities as $value) {      //key = une activité $value = ses infos
                    if($value->getIdUser() == $_SESSION['idUser']){
                        $data = array(
                            $value->getDesc(),
                            $value->getDate(),
                            $value->getDuration(),
                            $value->getDistance(),
                            $value->getCardiacFreqMin(),
                            $value->getCardiacFreqAvg(),
                            $value->getCardiacFreqMax()
                        );
                    } 
                    array_push($lActs,$data);
                }

                $this->render('list_activities',$lActs); 
        } else {
            $this->render('error',["Vous n'êtes pas connecté"]);
        }
    }
} 

?>
