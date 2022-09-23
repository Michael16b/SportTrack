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
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activities');
        return $results;
    }

    public final function insert(Activity $st): void{
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Activities(idAct,description,date,idUser) 
                        values (:id,:desc,:date,:idUser)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':desc',$st->getDesc(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':idUser',$st->getIdUser(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
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
            $query = "update Activities set description = :desc , date = :date, idUser = :idUser WHERE idAct = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':desc',$obj->getDesc(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$obj->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':idUser',$obj->getIdUser(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
