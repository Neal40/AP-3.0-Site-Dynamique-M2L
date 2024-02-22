<?php
class UtilisateurDTO{
    use Hydrate;
	private ?string $idUser;
	private ?string $idFonction;
	private ?int $IDLIGUE;
	private ?int $IDCLUB;
	private ?string $nom;
	private ?string $prenom;
	private ?string $login;
	private ?string $mdp;
	private ?string $statut;
	
	public function __construct(?string $unidUser  , ?string $unidFonction, ?int $unidLigue, ?int $unidClub, ?string $unnom,  
   ?string $unprenom, ?string $unlogin, ?string $unmdp, ?string $unStatut) {
		$this->idUser = $unidUser;
		$this->idFonction = $unidFonction;
        $this->IDLIGUE = $unidLigue;
        $this->IDCLUB = $unidClub;
        $this->nom = $unnom;
        $this->prenom = $unprenom;
        $this->login = $unlogin;
        $this->mdp = $unmdp;
        $this->statut = $unStatut;
	}

    // GETTERS
    
	public function getIDUSER(): ?string{
	    return $this->idUser;
	}
		
    public function getIDFONCTION(): ?string
    {
        return $this->idFonction;
    }
    
    public function getIDLIGUE(): ?int
    {
        return $this->IDLIGUE;
    }

    public function getIDCLUB(): ?int
    {
        return $this->IDCLUB;
    }
    
    public function getNOM(): ?string
    {
        return $this->nom;
    }

    public function getPRENOM(): ?string
    {
        return $this->prenom;
    }

    public function getSTATUT(): ?string
    {
        return $this->statut;
    }

    public function getMDP():?string{
        return $this->mdp;
    }

    public function setIDUSER($unID){
        $this->idUser = $unID;
    }

    public function setIDFONCTION($unID){
        $this->idFonction = $unID;
    }

    public function setIDLIGUE($idLIGUE){
        $this->idLigue = $idLIGUE;
    }

    public function setIDCLUB($idCLUB){
        $this->idClub = $idCLUB;
    }

    public function setNOM($unM){
        $this->nom = $unM;
    }

    public function setPRENOM($unM){
        $this->prenom = $unM;
    }

    public function setLOGIN($login){
        $this->login = $login;
    }

    public function setMDP($mdp){
        $this->mdp = $mdp;
    }

    public function setSTATUT($statut){
        $this->statut = $statut;
    }

}

