<?php
require_once('SqliteConnection.php');
class ActivityEntryDAO {
    private static ActivityEntryDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActivityEntryDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActivityEntryDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Data order by idData";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
        return $results;
    }

    public final function insert(Data $st): void{
        if($st instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Data(startTime,duration,distance,cardiacFreqMin,cardiacFreqAvg, cardiacFreqMax, longitude, latitude,altitude, idAct) 
                        values (:startT,:du,:dis,:cFreqMin,:cFreqAvg,:cFreqMax,:long,:lat,:alt,:idAct)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':startT',$st->getStartTime(),PDO::PARAM_STR);
            $stmt->bindValue(':du',$st->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':dis',$st->getDistance(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMin',$st->getCardiacFreqMin(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqAvg',$st->getCardiacFreqAvg(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMax',$st->getCardiacFreqMax(),PDO::PARAM_STR);
            $stmt->bindValue(':long',$st->getLongitude(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$st->getLatitude(),PDO::PARAM_STR);
            $stmt->bindValue(':alt',$st->getAltitude(),PDO::PARAM_STR);
            $stmt->bindValue(':idAct',$st->getIdAct(),PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();

            $lastId = $dbc -> lastInsertId();
            $st -> setId($lastId);
        }
    }

    public function delete(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Data where idData = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }


    public function deleteAll(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Data";
            $stmt = $dbc->prepare($query);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update Data set startTime = :startT ,duration = :du ,distance = :dis,cardiacFreqMin = :cFreqMin, cardiacFreqAvg = :cFreqAvg, 
                        cardiacFreqMax = :cFreqMax, longitude = :long, latitude = :lat, altitude = :alt, idAct = :idAct 
                        WHERE idData = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':startT',$obj->getStartTime(),PDO::PARAM_STR);
            $stmt->bindValue(':du',$obj->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':dis',$obj->getDistance(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMin',$obj->getCardiacFreqMin(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqAvg',$obj->getCardiacFreqAvg(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMax',$obj->getCardiacFreqMax(),PDO::PARAM_STR);
            $stmt->bindValue(':long',$obj->getLongitude(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$obj->getLatitude(),PDO::PARAM_STR);
            $stmt->bindValue(':alt',$obj->getAltitude(),PDO::PARAM_STR);
            $stmt->bindValue(':idAct',$obj->getIdAct(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
