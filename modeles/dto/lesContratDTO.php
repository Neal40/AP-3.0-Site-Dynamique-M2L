<?php
class lesContratDTO{
	private array $contrat ;


	public function __construct($array){
		if (is_array($array)) {
			$this->contrat = $array;
		}
	}

	public function getLesContrats(){
		return $this->contrat;
	}

	public function chercheContrat($unContratId){
		$i = 0;
		while ($unContratId != $this->contrat[$i]->getIdContrat() && $i < count($this->contrat)-1){
			$i++;
		}
		if ($unContratId == $this->contrat[$i]->getIdContrat()){
			return $this->contrat[$i];
		}
	}
	
	public function premierContrat(){
		return $this->contrat[0]->getIdContrat();
	}

	
}
