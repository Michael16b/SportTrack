<?php
class Data{

    public function  __construct() { }
    
    public function init($id,$st,$du,$dis,$cFreqMin,$cFreqAvg,$cFreqMax, $long,$lat,$alt, $idAct){
        $this->idData = $id;
        $this->startTime = $st;
        $this->duration = $du;
        $this->distance = $dis;
        $this->cardiacFreqMin = $cFreqMin;
        $this->cardiacFreqAvg = $cFreqAvg;
        $this->cardiacFreqMax = $cFreqMax;
        $this->longitude = $long;
        $this->latitude = $lat;
        $this->altitude = $alt;
        $this->idAct = $idAct;
    }


    public function getId(): string { return $this->idData; }
    public function getStartTime(): string { return $this->startTime; }
    public function getDuration(): string { return $this->duration; }
    public function getDistance(): string { return $this->distance; }
    public function getCardiacFreqMin(): string { return $this->cardiacFreqMin; }
    public function getCardiacFreqAvg(): int { return $this->cardiacFreqAvg; }
    public function getCardiacFreqMax(): int { return $this->cardiacFreqMax; }
    public function getLongitude(): string { return $this->longitude; }
    public function getLatitude(): string { return $this->latitude; }
    public function getAltitude(): string { return $this->altitude; }
    public function getIdAct(): string { return $this->idAct; }

    public function  __toString(): string { return $this->idData.
        $this->startTime. " ". 
        $this->duration. " ". 
        $this->distance. " ". 
        $this->cardiacFreqMin. " ".
        $this->cardiacFreqAvg. " ".
        $this->cardiacFreqMax. " ". 
        $this->longitude. " ". 
        $this->latitude. " ". 
        $this->altitude;}
    
}
?>