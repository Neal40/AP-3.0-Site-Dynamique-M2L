<?php
class lesBulletinDTO{
	private array $bulletin ;


	public function __construct($array){
		if (is_array($array)) {
			$this->bulletin = $array;
		}
	}

	public function getlesBulletins(){
		return $this->bulletin;
	}

	public function chercheBulletin($unBulletinId){
		$i = 0;
		while ($unBulletinId != $this->bulletin[$i]->getIdContrat() && $i < count($this->bulletin)-1){
			$i++;
		}
		if ($unBulletinId == $this->bulletin[$i]->getIdContrat()){
			return $this->bulletin[$i];
		}
	}
	
	public function premierContrat(){
		return $this->bulletin[0]->getlesBulletins();
	}

	
}
