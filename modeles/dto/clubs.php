<?php
class Clubs{
	use Hydrate;
	private array $clubs ;

	public function __construct($array){
		if (is_array($array)) {
			$this->clubs = $array;
		}
	}

	public function getNomClub(){
		return $this->clubs;
	}

	public function getAdresseClub(){
		return $this->clubs;
	}

	public function getListeClubs(){
		 
		return $this->clubs;
	}
}