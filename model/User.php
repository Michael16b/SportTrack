<?php
class User{

    public function  __construct() { }

    public function init($lName,$fName,$bDate,$gender,$size, $weight, $eMail, $password){
        $this->lName = $lName;
        $this->fName = $fName;
        $this->birthDate = $bDate;
        $this->gender = $gender;
        $this->size = $size;
        $this->weight = $weight;
        $this->eMail = $eMail;
        $this->weight = $weight;
        $this->password = $password;
    }

        
    public function getId(): int {return $this->default; }
    public function getIdUser(): int {return $this->idUser; }
    public function getlName(): string { return $this->lName; }
    public function getfName(): string { return $this->fName; }
    public function getBirthDate(): string { return $this->birthDate; }
    public function getGender(): string { return $this->gender; }
    public function getSize(): int { return $this->size; }
    public function getWeight(): int { return $this->weight; }
    public function getMail(): string { return $this->eMail; }
    public function getPassword(): string { return $this->password; }
    public function setId(int $id): void {$this->default = $id; }

    
    public function  __toString(): string { return $this->lName. " ". 
                                            $this->fName.
                                            $this->lName. " ". 
                                            $this->birthDate.
                                            $this->gender. " ". 
                                            $this->size.
                                            $this->weight. " ". 
                                            $this->eMail.
                                            $this->password;}
    


}
?>