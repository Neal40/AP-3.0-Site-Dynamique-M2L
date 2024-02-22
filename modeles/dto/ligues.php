<?php
class Ligues {
	use Hydrate;
	private array $ligues;

	public function __construct($array){
		if (is_array($array)) {
			$this->ligues = $array;
		}
	}
	
	public function getNomLigue(){
		return $this->ligues;
	}

	public function getLienSite(){
		return $this->ligues;
	}

	public function getListeLigues(){
		 
		return $this->ligues;
	}


	/*public static function ajouterLigue($nomLigue, $lienSite, $description) {
		try {
			// Préparation de la requête SQL sans les guillemets autour des paramètres
			$requetePreparee = DBConnex::getInstance()->prepare("INSERT INTO ligue (NOMLIGUE, LIENSITE, DESCRIPTIF) VALUES (:NOMLIGUE, :LIENSITE, :DESCRIPTIF)");
	
			// Liaison des paramètres
			$requetePreparee->bindParam(":NOMLIGUE", $nomLigue);
			$requetePreparee->bindParam(":LIENSITE", $lienSite);
			$requetePreparee->bindParam(":DESCRIPTIF", $description);
	
			// Exécution de la requête SQL
			$requetePreparee->execute();
	
			// Vous pouvez retourner un message de succès ou true si nécessaire
			return "Ligue ajoutée avec succès.";
		} catch (PDOException $e) {
			// Gérer les erreurs ici (par exemple, enregistrer dans un journal)
			// Vous pouvez aussi renvoyer une erreur ou une exception si vous le souhaitez
			return "Erreur lors de l'ajout de la ligue : " . $e->getMessage();
		}
	}*/

	
}