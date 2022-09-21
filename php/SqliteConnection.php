<?php
class SqliteConnection{
    private string $lName;
    private string $fName;
    private static $instance;

    public function  __construct() { 
        try {
            $this-> pdo = new PDO("sqlite:../bd/Sport_track.bd");
            $this-> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo "Error !: " . $e->getMessage() . "<br/>";
        }
    }
    public function getInstance() {
        if(!isset(self::$instance)){
            self::$instance = new SQLiteConnection();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->pdo;
    }
}
?>
