<?php
class Ligue{
    use Hydrate;
	private ?int $idLigue;
	private ?string $nomLigue;
	private ?string $lienSite;
	private ?string $descriptif;
    private array $lesClubs;
	
	public function __construct(?int $unIdLigue  , ?string $unNomLigue , ?string $unlienSite , ?string $unDescriptif){
	    $this->idLigue = $unIdLigue;
	    $this->nomLigue = $unNomLigue;
	    $this->lienSite = $unlienSite;
	    $this->descriptif = $unDescriptif;
	}
	
    // GETTERS
    
	public function getIdLigue(): ?int{
	    return $this->idLigue;
	}
	
	public function getNomLigue(): ?string
	{
	    return $this->nomLigue;
	}
	
    public function getLienSite(): ?string
    {
        return $this->lienSite;
    }
    
    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function getlesClubs(): array
    {
        return $this->lesClubs;
    }
    
    // SETTERS
    
    public function setIdLigue(?int $unIdLigue): void{
        $this->idLigue =  $unIdLigue;
    }
    
    public function setNomLigue(?string $unNomLigue): void{
        $this->nomLigue = $unNomLigue;
    }
    
    public function setLienSite(?string $unlienSite): void
    {
        $this->lienSite = $unlienSite;
    }

    public function setDescriptif(?string $unDescriptif): void
    {
        $this->descriptif = $unDescriptif;
    }

    public function setlesClubs(array $lesClubs)
    {
        $this->lesClubs = $lesClubs;
    }
}