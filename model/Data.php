<?php
class Data{

    public function  __construct() { }
    
    public function init($st, $long,$lat,$alt, $idAct){
        $this->startTime = $st;
        $this->longitude = $long;
        $this->latitude = $lat;
        $this->altitude = $alt;
        $this->idAct = $idAct;
    }


    public function getId(): string { return $this->default; }
    public function getStartTime(): string { return $this->startTime; }
    public function getLongitude(): string { return $this->longitude; }
    public function getLatitude(): string { return $this->latitude; }
    public function getAltitude(): string { return $this->altitude; }
    public function getIdAct(): string { return $this->idAct; }
    public function setId(int $id): void {$this->default = $id; }

    public function  __toString(): string { return $this->idData.
        $this->startTime. " ". 
        $this->longitude. " ". 
        $this->latitude. " ". 
        $this->altitude;}
    
}
?>