<?php
require(__ROOT__.'/controllers/Controller.php');
require_once (__ROOT__.'/model/User.php');
require_once (__ROOT__.'/model/Activity.php');
require_once (__ROOT__.'/model/Data.php');
require_once (__ROOT__.'/model/ActivityDAO.php');
require_once (__ROOT__.'/model/ActivityEntryDAO.php');



class UploadActivityController extends Controller{
    public function get($request){
        $this->render('upload_activity_form',[]);
    }


    public function post($request){
        if ($_SESSION) {

            $nameJsonFile = $request['myfile'];
            $json  = file_get_contents($nameJsonFile);
            $jsonData = json_decode($json,true);
            $arrayData = array();
            $arrayActivity = array();

            foreach($jsonData as $key => $value) {
                if ($key == "activity") {
                    array_push($arrayActivity, $value['description'], $value['date']);
                } else if ($key == "data") {
                    foreach($value as $value2){
                        $arrayData[] =  [$value2["time"], $value2["cardio_frequency"], $value2["latitude"], $value2["longitude"], $value2["altitude"]];
                    }
                    
                } else {
                    $this->render('error',["Erreur de format de fichier"]);
                }
            }
            

            

            $this->render('upload_activity_valid',[$arrayActivity]);
        } else {
            $this->render('user_connect_form',[]);
        }
    }
}
?>
