<?php
class contratDTO{
    use Hydrate;
	private ?string  $IDCONTRAT;
	private ?string  $IdUserContrat;
    private ?string  $DateDebut;
    private ?string  $DateFin;
    private ?string  $TypeContrat;
    private ?int  $NbHeures;

    public function __construct(?string $unIdContrat, ?string $unIdUser, ?string $uneDateDebut, ?string $uneDateFin, ?string  $unTypeContrat, ?int  $NbHeures){
        $this->IDCONTRAT=$unIdContrat; 
        $this->IdUserContrat=$unIdUser; 
        $this->DateDebut=$uneDateDebut; 
        $this->DateFin=$uneDateFin; 
        $this->TypeContrat=$unTypeContrat; 
        $this->NbHeures=$NbHeures; 
    }

    public function getIDCONTRAT() {
		return $this->IDCONTRAT;
	}   
	
	public function setIDCONTRAT(?string $unIdContrat)  {
	    $this->IDCONTRAT =  $unIdContrat;
	}



    public function getIDUSER() {
		return $this->IdUserContrat;
	}   
	
	public function setIDUSER(?string $unIdUser)  {
	    $this->IdUserContrat =  $unIdUser;
	}




    public function getDATEDEBUT() {
		return $this->DateDebut;
	}   
	
	public function setDATEDEBUT(?string $uneDateDebut)  {
	    $this->DateDebut =  $uneDateDebut;
	}



    public function getDATEFIN() {
		return $this->DateFin;
	}   
	
	public function setDATEFIN(?string $uneDateFin)  {
	    $this->DateFin =  $uneDateFin;
	}



    public function getTYPECONTRAT() {
		return $this->TypeContrat;
	}   
	
	public function setTYPECONTRAT(?string $unTypeContrat)  {
	    $this->TypeContrat =  $unTypeContrat;
	}



    public function getNBHEURES() {
		return $this->NbHeures;
	}   
	
	public function setNBHEURES(string $NbHeures)  {
	    $this->NbHeures =  $NbHeures;
	}
}

    


