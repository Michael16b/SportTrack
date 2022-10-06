<?php
require(CONTROLLERS_DIR.'/Controller.php');
require_once (__ROOT__.'/model/User.php');
require_once (__ROOT__.'/model/Activity.php');
require_once (__ROOT__.'/model/Data.php');
require_once (__ROOT__.'/model/ActivityDAO.php');
require_once (__ROOT__.'/model/ActivityEntryDAO.php');
require_once (__ROOT__.'/model/CalculDistanceImpl.php');



class UploadActivityController extends Controller{
    public function get($request){
        $this->render('upload_activity_form',[]);
    }


    public function post($request){
            if ($_SESSION) {
                if(isset($_FILES['myfile'])) {
                    $json  = file_get_contents($_FILES['myfile']['tmp_name']);
                    $jsonData = json_decode($json,true);
                    
                    $arrayData = array();
                    $arrayActivity = array();
                    $dateTimeNow = new DateTime();
                    $dateNow = $dateTimeNow->format('Y-m-d');
                    $dateBlock = false;
                    if (is_countable($jsonData)) {
                        if (count($jsonData) > 0) {
                            foreach($jsonData as $key => $value) {
                                if ($dateBlock == false) {
                                    if ($key == "activity") {
                                        $date = date('Y-m-d', strtotime($value['date']));
                                        $newDate = new DateTime($date);
                                        if ($newDate > $dateNow || !($date) === $newDate) {
                                            $this->render('error',["La date de l'activité ne peut pas être supérieure à la date du jour OU la date est invalide \n"]);
                                            $dateBlock = true;
                                            break;
                                        } else {
                                            array_push($arrayActivity, $value['description'], $value['date']);
                                    }
                                    } else if ($key == "data" ) {
                                        foreach($value as $value2){
                                            $arrayData[] =  [$value2["time"], $value2["cardio_frequency"], $value2["latitude"], $value2["longitude"], $value2["altitude"]];
                                        }
                                }
                                
                            } else {
                                $this->render('error',["Erreur de format de fichier"]);
                            }
                        }
                    
                        
                        if ($dateBlock == false) {
                            $startTime = $arrayData[0][0];
                            $duration =  strtotime($arrayData[count($arrayData)-1][0]) - strtotime($startTime);
                            $duration =  date('H:i:s', $duration);
                            

                            $minCardio = $arrayData[0][1];
                            $avgCardio = $arrayData[0][1];
                            $maxCardio = $arrayData[0][1];
                            for ($i=1; $i < count($arrayData); $i++) { 
                                if ($arrayData[$i][1] < $minCardio) {
                                    $minCardio = $arrayData[$i][1];
                                }
                                if ($arrayData[$i][1] > $maxCardio) {
                                    $maxCardio = $arrayData[$i][1];
                                }
                                $avgCardio += $arrayData[$i][1];
                            }
                            $avgCardio = $avgCardio / count($arrayData);
                            

                            
                            $arrayDistance = array();
                            for ($i=0; $i < count($arrayData); $i++) { 
                                $arrayDistance[] = array("longitude" => $arrayData[$i][3], "latitude" => $arrayData[$i][2]);
                            }
                            $classCalc = new CalculDistanceImpl();
                            $distance = $classCalc->calculDistanceTrajet($arrayDistance);
                            $activity = new Activity();
                            $activity -> init($arrayActivity[0],$arrayActivity[1],$startTime,$duration,round($distance,2),$minCardio,$avgCardio,$maxCardio,$_SESSION['idUser']);
                            ActivityDAO::getInstance()->insert($activity);

                            $activity = ActivityDAO::getInstance()->findActivity($activity);
                            $idActivity = $activity[0] -> getIdActivity();
                            $data = new Data();
                            $arrayData = array_values($arrayData);
                            $data -> init($startTime,$duration,$arrayData[0][3],$arrayData[0][2],$arrayData[0][4],$idActivity);
                            
                            ActivityEntryDAO::getInstance()->insert($data);
                            $this->render('upload_activity_valid',[$arrayActivity]);
                        }
                    } else {
                        $this->render('error',["Erreur de format de fichier"]);
                    }
                } else {
                    $this->render('error',["Erreur de format de fichier"]);
                }
                    } else {
                        $this->render('error',["Fichier non retrouvé"]);
                    }
                } else {
                    $this->render('user_connect_form',[]); 
                }
            } 
    }
?>
