<?php
class demandes{
	private array $demandes ;

	public function __construct($array){
		if (is_array($array)) {
			$this->demandes = $array;
		}
	}

	public function getDemandes(){
		return $this->demandes;
	}
    
	public function chercheDemandes($unIdFormation){
		$i = 0;
		while ( $i < count($this->demandes)){
			if ($unIdFormation == $this->demandes[$i]->getIDFORMA()){
					return $this->demandes[$i];
			}
			$i++;
		}	
	}


}