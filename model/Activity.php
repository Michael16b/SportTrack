<?php
class Activity{

    public function  __construct() { }
    public function init($desc,$d,$du,$dis,$cFreqMin,$cFreqAvg,$cFreqMax,$idU){
        $this->description = $desc;
        $this->date = $d;
        $this->duration = $du;
        $this->distance = $dis;
        $this->cardiacFreqMin = $cFreqMin;
        $this->cardiacFreqAvg = $cFreqAvg;
        $this->cardiacFreqMax = $cFreqMax;
        $this->idUser = $idU;
        
    }


    public function getId(): int {return $this->default; }
    public function getIdActivity(): int {return $this->idAct; }
    public function getDesc(): string { return $this->description; }
    public function getDate(): string { return $this->date; }
    public function getDuration(): string { return $this->duration; }
    public function getDistance(): string { return $this->distance; }
    public function getCardiacFreqMin(): string { return $this->cardiacFreqMin; }
    public function getCardiacFreqAvg(): int { return $this->cardiacFreqAvg; }
    public function getCardiacFreqMax(): int { return $this->cardiacFreqMax; }
    public function getIdUser(): string { return $this->idUser; }
    public function setId(int $id): void {$this->default = $id; }
    
    public function  __toString(): string { return $this->idData.
        $this->idAct. " ". 
        $this->description. " ". 
        $this->distance. " ". 
        $this->date. " ".
        $this->duration. " ". 
        $this->distance. " ". 
        $this->cardiacFreqMin. " ".
        $this->cardiacFreqAvg. " ".
        $this->cardiacFreqMax. " ". 
        $this->idUser;}
}
?>