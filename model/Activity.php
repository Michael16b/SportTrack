<?php
class Activity{

    public function  __construct() { }
    public function init($desc,$d,$idU){
        $this->description = $desc;
        $this->date = $d;
        $this->idUser = $idU;
        
    }


    public function getId(): int {return $this->default; }
    public function getDesc(): string { return $this->description; }
    public function getDate(): string { return $this->date; }
    public function getIdUser(): string { return $this->idUser; }
    public function setId(int $id): void {$this->default = $id; }
    
    public function  __toString(): string { return $this->idData.
        $this->idAct. " ". 
        $this->description. " ". 
        $this->distance. " ". 
        $this->date. " ".
        $this->idUser;}
}
?>