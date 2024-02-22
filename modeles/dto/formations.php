<?php
class formations{
	private array $formations ;

	public function __construct($array){
		if (is_array($array)) {
			$this->formations = $array;
		}
	}

	public function getFormations(){
		return $this->formations;
	}
    
	public function chercheFormations($unIdFormation){
		$i = 0;
		while ($unIdFormation != $this->formations[$i]->getIDFORMA() && $i < count($this->formations)-1){
			$i++;
		}
		if ($unIdFormation == $this->formations[$i]->getIDFORMA()){
			return $this->formations[$i];
		}
	}
}