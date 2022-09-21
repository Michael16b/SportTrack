<?php
class SqliteConnection{
    private $pdo;
    private static $instance;

    public function  __construct() { 
        try {
            $this-> pdo = new PDO("sqlite:../bd/Sport_track.db");
            $this-> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo "Error !: " . $e->getMessage() . "<br/>";
        }
    }
    public static function getInstance() {
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
