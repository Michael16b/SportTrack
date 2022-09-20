<?php
require_once('SqliteConnection.php');
class UserDAO {
    private static UserDAO $dao;

    private function __construct() {}

    public static function getInstance(): UserDAO {
        if(!isset(self::$dao)) {
            self::$dao= new UserDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from students order by nom,prenom";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(User $st): void{
        if($st instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into User(nom, prenom) values (:n,:p)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$st->getlName(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getfName(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from User where idUser = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$obj->getlName(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$obj->getfName(),PDO::PARAM_STR);
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update User set lName = :n , fName = :p WHERE idUser = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$obj->getlName(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$obj->getfName(),PDO::PARAM_STR);
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
