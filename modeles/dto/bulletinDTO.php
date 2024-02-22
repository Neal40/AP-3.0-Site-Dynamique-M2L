<?php
class bulletinDTO{
    use Hydrate;
	private ?string  $IDBULLETIN;
	private ?string  $IDCONTRAT;
    private ?string  $MOIS ;
    private ?string  $ANNEE;
    private ?string  $BULLETINPDF;


    public function __construct(?string $unIDBULLETIN, ?string $unIDCONTRAT, ?string $unMOIS, ?string $uneANNEE , ?string  $unBULLETINPDF){
        $this->IDBULLETIN=$unIDBULLETIN; 
        $this->IDCONTRAT=$unIDCONTRAT; 
        $this->MOIS =$unMOIS; 
        $this->ANNEE=$uneANNEE; 
        $this->BULLETINPDF=$unBULLETINPDF; 
    }

    public function getIdBulletin() {
		return $this->IDBULLETIN;
	}   
	
	public function setIdBulletin(?string $unIDBULLETIN)  {
	    $this->IDBULLETIN =  $unIDBULLETIN;
	}



    public function getIdContrat() {
		return $this->IDCONTRAT;
	}   
	
	public function setIdContrat(?string $unIDCONTRAT)  {
	    $this->IDCONTRAT =  $unIDCONTRAT;
	}




    public function getMois() {
		return $this->MOIS ;
	}   
	
	public function setMois(?string $unMOIS )  {
	    $this->MOIS  =  $unMOIS ;
	}



    public function getANNE() {
		return $this->ANNEE;
	}   
	
	public function setANNE(?string $uneANNEE)  {
	    $this->ANNEE =  $uneANNEE;
	}



    public function getBULLETINPDF() {
		return $this->BULLETINPDF;
	}   
	
	public function setBULLETINPDF(?string $unBULLETINPDF)  {
	    $this->BULLETINPDF =  $unBULLETINPDF;
	}



   
}

    


