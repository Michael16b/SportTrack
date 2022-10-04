<?php
require_once('SqliteConnection.php');
class ActivityDAO {
    private static ActivityDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActivityDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActivityDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Activities order by idAct";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
        return $results;
    }

    public final function insert(Activity $st): void{
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Activities(description,date,duration,distance,cardiacFreqMin,cardiacFreqAvg, cardiacFreqMax,idUser) 
                        values (:desc,:date,:du,:dis,:cFreqMin,:cFreqAvg,:cFreqMax,:idUser)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':desc',$st->getDesc(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':du',$st->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':dis',$st->getDistance(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMin',$st->getCardiacFreqMin(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqAvg',$st->getCardiacFreqAvg(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMax',$st->getCardiacFreqMax(),PDO::PARAM_STR);
            $stmt->bindValue(':idUser',$st->getIdUser(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();

            $lastId = $dbc -> lastInsertId();
            $st -> setId($lastId);
        }
    }

    public function delete(Activity $obj): void {
        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Activities where idAct = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }


    public function deleteAll(Activity $obj): void {
        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Activities";
            $stmt = $dbc->prepare($query);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(Activity $obj): void {
        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update Activities set description = :desc , date = :date,duration = :du ,distance = :dis,cardiacFreqMin = :cFreqMin, cardiacFreqAvg = :cFreqAvg, 
            cardiacFreqMax = :cFreqMax, idUser = :idUser WHERE idAct = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':desc',$obj->getDesc(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$obj->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':du',$obj->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':dis',$obj->getDistance(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMin',$obj->getCardiacFreqMin(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqAvg',$obj->getCardiacFreqAvg(),PDO::PARAM_STR);
            $stmt->bindValue(':cFreqMax',$obj->getCardiacFreqMax(),PDO::PARAM_STR);
            $stmt->bindValue(':idUser',$obj->getIdUser(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function findActivity(Activity $obj): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Activities where idUser = :idUser and description = :desc and date = :date and duration = :du and distance = :dis and cardiacFreqMin = :cFreqMin and cardiacFreqAvg = :cFreqAvg and
        cardiacFreqMax = :cFreqMax";
        $stmt = $dbc->query($query);
        
        

        // bind the paramaters
        $stmt->bindValue(':desc',$obj->getDesc(),PDO::PARAM_STR);
        $stmt->bindValue(':date',$obj->getDate(),PDO::PARAM_STR);
        $stmt->bindValue(':du',$obj->getDuration(),PDO::PARAM_STR);
        $stmt->bindValue(':dis',$obj->getDistance(),PDO::PARAM_STR);
        $stmt->bindValue(':cFreqMin',$obj->getCardiacFreqMin(),PDO::PARAM_STR);
        $stmt->bindValue(':cFreqAvg',$obj->getCardiacFreqAvg(),PDO::PARAM_STR);
        $stmt->bindValue(':cFreqMax',$obj->getCardiacFreqMax(),PDO::PARAM_STR);
        $stmt->bindValue(':idUser',$obj->getIdUser(),PDO::PARAM_STR);


        $stmt -> execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');

        // execute the prepared statement
        return $results;
    }
}
?>
