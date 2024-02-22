<?php
    class ClubDAO {
    public static function ListeClubs(){
        $result = [];
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT * FROM club ORDER BY NOMCLUB");
        $queryPrepa->execute();

        $listeClubs = $queryPrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($listeClubs)){
            foreach($listeClubs as $club){
                $unClub = new Club(null, null, null, null,null);
                $unClub->hydrate($club);
                $result[] = $unClub;
            }
        } 
        return $result;
    }
    public static function getClubsByLigue($idClub){
        $result = [];
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT club.IDCLUB, club.NOMCLUB, club.ADRESSECLUB FROM club, ligue WHERE club.IDLIGUE = :idClub AND club.IDLIGUE = ligue.IDLIGUE ORDER BY NOMLIGUE ");
        $queryPrepa->bindParam(":idClub", $idClub);
        $queryPrepa->execute();
        $ListeClubs = $queryPrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($ListeClubs)){
            foreach($ListeClubs as $club){
            $unClub = new Club(null, null, null, null, null);
            $unClub->hydrate($club);
            $result[] = $unClub;
            }
        }
        return $result;
    }

    public static function getClubByNom(string $nomClub){
        $result = [];
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT * FROM club WHERE NOMCLUB =:nomClub");
        $queryPrepa->bindParam(":nomClub", $nomClub);
        $queryPrepa->execute();

        $ListeClubs = $queryPrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($ListeClubs)){
            foreach($ListeClubs as $club){
            $unClub = new Club(null, null, null, null, null);
            $unClub->hydrate($club);
            $result[] = $unClub;
            }
        }
        return $result;
    } 

    public static function supprimerClub($nomClub) {
        // Vérifiez si le club existe
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT NOMCLUB FROM club WHERE NOMCLUB = :nomClub");
        $queryPrepa->bindParam(":nomClub", $nomClub, PDO::PARAM_STR);
        $queryPrepa->execute();

        $result = $queryPrepa->fetch(PDO::FETCH_NUM);
        if ($result) {
            // Si le club existe, on fait une requête de suppression
            $queryPrepa2 = DBConnex::getInstance()->prepare("DELETE FROM club WHERE NOMCLUB = :nomClub");
            $queryPrepa2->bindParam(":nomClub", $nomClub, PDO::PARAM_STR);
            $queryPrepa2->execute();
        } 
        else {
            // Si le club n'existe pas, renvoyer null
            return null;
        }
    }

    // Fonction pour ajouter un club + id en auto-incrémentation
    public static function ajouterClub($idLigue, $idCommune, $nomClub, $adresseClub){
        try {
            $queryPrepa = DBConnex::getInstance()->prepare("INSERT INTO club (IDLIGUE, IDCOMMUNE, NOMCLUB, ADRESSECLUB) VALUES (:idLigue, :idCommune, :nomClub, :adresseClub)");
            $queryPrepa->bindParam(":idLigue", $idLigue);
            $queryPrepa->bindParam(":idCommune", $idCommune);
            $queryPrepa->bindParam(":nomClub", $nomClub);
            $queryPrepa->bindParam(":adresseClub", $adresseClub);
            $queryPrepa->execute();
        } catch (PDOException $e) {
            // Affichage du message d'erreur de la classe PDOException
            echo "PDOException: " . $e->getMessage();
        }
    }
    

    // Fonction pour enregistrer une Club
    public static function enregistrerClub($idLigue, $idCommune, $nomClub,$adresseClub){
        try {
            $queryPrepa = DBConnex::getInstance()->prepare("INSERT INTO club (IDLIGUE, IDCOMMUNE, NOMCLUB, ADRESSECLUB) VALUES (:idLigue, :idCommune, :nomClub, :adresseClub)");
            $queryPrepa->bindParam(":idLigue", $idLigue);
            $queryPrepa->bindParam(":idCommune", $idCommune);
            $queryPrepa->bindParam(":nomClub", $nomClub);
            $queryPrepa->bindParam(":adresseClub", $adresseClub);
            $queryPrepa->execute();
        } catch (PDOException $e) {
            // Affichage du message d'erreur de la classe PDOException
            echo "PDOException: " . $e->getMessage();
        }
    }
    
    // Fonction pour modifier une Club
    public static function modifierClub($idLigue, $idCommune, $nomClub, $adresseClub){
        try {
            $queryPrepa = DBConnex::getInstance()->prepare("UPDATE club SET IDLIGUE=:idLigue, IDCOMMUNE=:idCommune, NOMCLUB=:nomClub, ADRESSECLUB=:adresseClub WHERE NOMCLUB=:nomClub");
            $queryPrepa->bindParam(":idLigue", $idLigue);
            $queryPrepa->bindParam(":idCommune", $idCommune);
            $queryPrepa->bindParam(":nomClub", $nomClub);
            $queryPrepa->bindParam(":adresseClub", $adresseClub);
            $queryPrepa->execute();
        } catch (PDOException $e) {
            // Affichage du message d'erreur de la classe PDOException
            echo "PDOException: " . $e->getMessage();
        }
    }
}