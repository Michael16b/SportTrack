<?php
class Activity{

    public function  __construct() { }
    public function init($id,$desc,$d,$idU){
        $this->idAct = $id;
        $this->description = $desc;
        $this->date = $d;
        $this->idUser = $idU;
        
    }


    public function getId(): string { return $this->idAct; }
    public function getDesc(): string { return $this->description; }
    public function getDate(): string { return $this->date; }
    public function getIdUser(): string { return $this->idUser; }
    
    public function  __toString(): string { return $this->idData.
        $this->idAct. " ". 
        $this->description. " ". 
        $this->distance. " ". 
        $this->date. " ".
        $this->idUser;}
}
?>