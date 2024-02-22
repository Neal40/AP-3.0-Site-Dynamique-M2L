<?php
class demande{
    use Hydrate;
    private ?int $IDFORMA;
    private ?string $IDUSER;
    private ?string $ETAT;

    public function __construct($unIdForma, $unIdUser, $unEtat){
        $this->IDFORMA = $unIdForma;
        $this->IDUSER = $unIdUser;
        $this->ETAT = $unEtat;
    }

    public function getIDFORMA(){
        return $this->IDFORMA;
    }

    public function setIDFORMA($unIdForma){
        $this->IDFORMA = $unIdForma;
    }

    public function getIDUSER(){
        return $this->IDUSER;
    }

    public function setIDUSER($unIdUser){
        $this->IDUSER = $unIdUser;
    }

    public function getETAT(){
        return $this->ETAT;
    }

    public function setETAT($unEtat){
        $this->ETAT = $unEtat;
    }
}