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
        $query = "select * from User order by lName,fName";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }


    public final function findUser(string $mail, string $password): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from User where email = :mail and password = :pwd";
        $stmt = $dbc->query($query);
        
        
        $stmt->bindValue(':mail',$mail,PDO::PARAM_STR);
        $stmt->bindValue(':pwd',$password,PDO::PARAM_STR);

        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(User $st): void{
        if($st instanceof User){


            $dbc = SqliteConnection::getInstance()->getConnection();

            

            // prepare the SQL statement
            $query = "insert into User(lName,fName,birthDate,gender,size, weight, eMail, password) 
                        values (:n,:fN,:birthD,:gd,:sz,:wght,:mail,:pwd)";

            

            $stmt = $dbc->prepare($query);
            
            
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getlName(),PDO::PARAM_STR);
            $stmt->bindValue(':fN',$st->getfName(),PDO::PARAM_STR);
            $stmt->bindValue(':birthD',$st->getBirthDate(),PDO::PARAM_STR);
            $stmt->bindValue(':gd',$st->getGender(),PDO::PARAM_STR);
            $stmt->bindValue(':sz',$st->getSize(),PDO::PARAM_STR);
            $stmt->bindValue(':wght',$st->getWeight(),PDO::PARAM_STR);
            $stmt->bindValue(':mail',$st->getMail(),PDO::PARAM_STR);
            $stmt->bindValue(':pwd',$st->getPassword(),PDO::PARAM_STR);
            

            

            // execute the prepared statement
            $stmt->execute();

            $lastId = $dbc -> lastInsertId();
            $st -> setId($lastId);
            
            
        }
    }

    public function delete(User $obj): void {
        if($obj instanceof User){
            $id = $obj -> getId();
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from User where idUser = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }


    public function deleteAll(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from User";
            $stmt = $dbc->prepare($query);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update User set lName = :n , fName = :fN, birthDate = :birthD, gender = :gd, size = :sz, weight = :wght, eMail= :mail, password = :pwd   WHERE idUser = :id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':n',$obj->getlName(),PDO::PARAM_STR);
            $stmt->bindValue(':fN',$obj->getfName(),PDO::PARAM_STR);
            $stmt->bindValue(':birthD',$obj->getBirthDate(),PDO::PARAM_STR);
            $stmt->bindValue(':gd',$obj->getGender(),PDO::PARAM_STR);
            $stmt->bindValue(':sz',$obj->getSize(),PDO::PARAM_STR);
            $stmt->bindValue(':wght',$obj->getWeight(),PDO::PARAM_STR);
            $stmt->bindValue(':mail',$obj->getMail(),PDO::PARAM_STR);
            $stmt->bindValue(':pwd',$obj->getPassword(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
