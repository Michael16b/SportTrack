<?php
class User{
    private string $lName;
    private string $fName;

    public function  __construct() { }
    public function init($n, $p){
        $this->lName = $n;
        $this->fName = $p;
    }

    public function getNom(): string { return $this->lName; }
    public function getPrenom(): string { return $this->fName; }
    public function  __toString(): string { return $this->lName. " ". $this->fName; }
}
?>