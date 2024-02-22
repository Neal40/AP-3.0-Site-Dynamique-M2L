<?php
class Club{
    use Hydrate;
	private ?int $idClub;
	private ?int $idLigue;
	private ?int $idCommune;
	private ?string $nomClub;
	private ?string $adresseClub;
	
	public function __construct(?int $unIdClub  , ?int $unIdLigue , ?int $unIdCommune , ?string $unNomClub , ?string $uneAdresseClub){
	    $this->idClub = $unIdClub;
	    $this->idLigue = $unIdLigue;
	    $this->idCommune = $unIdCommune;
	    $this->nomClub = $unNomClub;
	    $this->adresseClub = $uneAdresseClub;
	}
	
    // GETTERS
    
	public function getIdClub(): ?int{
	    return $this->idClub;
	}

    public function getIdLigue(): ?int{
	    return $this->idLigue;
	}

    public function getIdCommune(): ?int{
	    return $this->idCommune;
	}

    public function getNomClub(): ?string
    {
        return $this->nomClub;
    }

    public function getAdresseClub(): ?string
    {
        return $this->adresseClub;
    }
    
    // SETTERS
    
    public function setIdClub(int $unIdClub): void{
        $this->idClub =  $unIdClub;
    }
    
    public function setIdLigue(int $unIdLigue): void{
        $this->idLigue = $unIdLigue;
    }
    
    public function setIdCommune(int $unIdCommune): void
    {
        $this->idCommune = $unIdCommune;
    }

    public function setNomClub(string $unNomClub)
    {
        $this->nomClub = $unNomClub;
    }

    public function setAdresseClub(string $uneAdresseClub)
    {
        $this->adresseClub = $uneAdresseClub;
    }
}