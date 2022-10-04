<?php
require(CONTROLLERS_DIR.'/Controller.php');
require_once (__ROOT__.'/model/Activity.php');
require_once (__ROOT__.'/model/ActivityDAO.php');

class ListActivityController extends Controller{

    public function get($request){
        if ($_SESSION) {
            $lActs = array();
                $allActivities = ActivityDAO::getInstance()->findAll();
                if (count($allActivities) > 0) {
                    foreach ($allActivities as $value) {
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
                            array_push($lActs,$data);
                        } 
                        
                    }
    
                    $this->render('list_activities',$lActs); 
                } else {
                    $this->render('list_activities', []); 
                }
                
        } else {
            $this->render('error',["Vous n'êtes pas connecté"]);
        }
    }
} 

?>
