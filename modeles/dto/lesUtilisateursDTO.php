<?php
class LesutilisateursDTO{
	private array $utilisateur ;
	


	public function __construct($array){
		if (is_array($array)) {
			$this->utilisateur = $array;
		}
	}
	public function getIntervenant(){
		return $this->utilisateur;
	}


	public function chercheUtilisateur($unIdUtilisateur){
		$i = 0;
		while ($unIdUtilisateur != $this->utilisateur[$i]->getIdUser() && $i < count($this->utilisateur)-1){
			$i++;
		}
		if ($unIdUtilisateur == $this->utilisateur[$i]->getIdUser()){
			return $this->utilisateur[$i];
		}
	}
	
	public function premierUtilisateur(){
		return $this->utilisateur[0]->getIdUser();
	}


	
	
}
