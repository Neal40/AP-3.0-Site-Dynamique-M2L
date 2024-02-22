<?php
class LigueDAO {
    public static function ListeLigues(){
        $result = [];
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT * FROM ligue ORDER BY NOMLIGUE");
        $queryPrepa->execute();

        $listeLigues = $queryPrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($listeLigues)){
            foreach($listeLigues as $ligue){
                $uneLigue = new Ligue(null, null, null, null);
                $uneLigue->hydrate($ligue);
                $uneLigue->setlesClubs(ClubDAO::getClubsByLigue($uneLigue->getIdLigue()));
                $result[] = $uneLigue;
            }
        }
        return $result;
    }
    
    public static function getLigueByNom(string $nomLigue){
        $result = [];
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT * FROM ligue WHERE NOMLIGUE =:nomLigue");
        $queryPrepa->bindParam(":nomLigue", $nomLigue);
        $queryPrepa->execute();

        $listeLigues = $queryPrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($listeLigues)){
            foreach($listeLigues as $ligue){
                $uneLigue = new Ligue(null, null, null, null);
                $uneLigue->hydrate($ligue);
                $result[] = $uneLigue;
            }
        }
        return $result;
    }     

    public static function getLigueByNom2(string $nomLigue){
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT NOMLIGUE FROM ligue WHERE NOMLIGUE =:nomLigue");
        $queryPrepa->bindParam(":nomLigue", $nomLigue);
        $queryPrepa->execute();
    }     
        
        
            // Pour récupérer l'id d'une ligue sans l'avoir, en passant par son nom
      /*  public static function getIdByNomLigue($idLigue,$nomLigue){
            $queryPrepa = DBConnex::getInstance()->prepare("SELECT IDLIGUE, NOMLIGUE FROM ligue WHERE IDLIGUE= :idLigue, NOMLIGUE = :nomLigue");
 

            $queryPrepa->bindParam(":idLigue", $idLigue); 
            $queryPrepa->bindParam(":nomLigue", $nomLigue); 
print_r($queryPrepa);
            $queryPrepa->execute();

          //PDO::PARAM_STR
        
        }
        
               // Fonction pour supprimer une ligue

         public static function supprimerLigue($idLigue){
            $queryPrepa = DBConnex::getInstance()->prepare("DELETE FROM ligue,club WHERE IDLIGUE = :idLigue");
            $queryPrepa->bindParam(':idLigue', $idLigue);
            $queryPrepa->execute();
 


        }*/

    public static function supprimerLigue($nomLigue) {
        // Vérifiez si la ligue existe
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT NOMLIGUE FROM ligue WHERE NOMLIGUE = :nomLigue");
        $queryPrepa->bindParam(":nomLigue", $nomLigue, PDO::PARAM_STR);
        $queryPrepa->execute();
        
        $result = $queryPrepa->fetch(PDO::FETCH_NUM);
        if ($result) {
            // Si la ligue existe, on fait une requête de suppression
            $queryPrepa2 = DBConnex::getInstance()->prepare("DELETE FROM ligue WHERE NOMLIGUE = :nomLigue");
            $queryPrepa2->bindParam(":nomLigue", $nomLigue, PDO::PARAM_STR);
            $queryPrepa2->execute();
        } 
        else {
            // Si la ligue n'existe pas, renvoyer null
            return null;
        }
    }
        

            /* try {
             $queryPrepa = DBConnex::getInstance()->prepare("DELETE FROM ligue,club WHERE IDLIGUE =:idLigue");
             $queryPrepa->bindParam(":idLigue", $idLigue, PDO::PARAM_INT);
             
             $queryPrepa->execute();

                       


                        // Vous pouvez renvoyer un message de succès ou effectuer d'autres actions ici
                return "La ligue a été supprimée avec succès.";
             }
            catch (Exception $e) {
                // Gérer l'exception ici, par exemple, en affichant le message d'erreur.
                echo "La ligue avec l'ID spécifié n'a pas été trouvée / Erreur :  " . $e->getMessage();
            }*/
         









/*public static function supprimerLigueParID($idLigue){
    // Pour vérifier si l'ID de la ligue existe
    $queryPrepa = DBConnex::getInstance()->prepare("SELECT IDLIGUE FROM ligue WHERE IDLIGUE = :idLigue");
    $queryPrepa->bindParam(":idLigue", $idLigue, PDO::PARAM_INT);
    $queryPrepa->execute();

    if ($queryPrepa->rowCount() > 0) {
        // L'ID de la ligue existe, vous pouvez la supprimer
        $deleteQuery = DBConnex::getInstance()->prepare("DELETE FROM ligue,club WHERE IDLIGUE = :idLigue");
        $deleteQuery->bindParam(":idLigue", $idLigue, PDO::PARAM_INT);
        $deleteQuery->execute();
        
        // Vous pouvez renvoyer un message de succès ou effectuer d'autres actions ici
        return "La ligue a été supprimée avec succès.";
    } else {
        // L'ID de la ligue n'existe pas
        return "La ligue avec l'ID spécifié n'a pas été trouvée.";
    }
}*/


    
        // Fonction pour ajouter une ligue + id en auto-incrémentation
    public static function ajouterLigue($nomLigue, $lienSite, $description){
     $queryPrepa = DBConnex::getInstance()->prepare("INSERT INTO ligue (NOMLIGUE,LIENSITE,DESCRIPTIF) VALUES (:nomLigue,:lienSite,:descriptif)");
        $queryPrepa->bindParam(":nomLigue", $nomLigue);
        $queryPrepa->bindParam(":lienSite", $lienSite);
        $queryPrepa->bindParam(":descriptif", $description);
        $queryPrepa->execute();
         
     }
    
    /* public static function enregistrerLigue($nomLigue, $lienSite, $description) {
        $queryPrepa = DBConnex::getInstance()->prepare("SELECT NOMLIGUE FROM ligue WHERE NOMLIGUE = :nomligue");
        $queryPrepa->bindParam(":nomligue", $nomLigue, PDO::PARAM_STR);
        $queryPrepa->execute();
        $result = $queryPrepa->fetch(PDO::FETCH_NUM);
        
        if ($result) {
            // La ligue existe, vous pouvez maintenant la mettre à jour
            $queryPrepa2 = DBConnex::getInstance()->prepare("UPDATE ligue SET NOMLIGUE= :nomLigue, SITE=:liensite, DESCRIPTIF=:descriptif WHERE NOMLIGUE = :nomligue");
            $queryPrepa2->bindParam(":nomligue", $nomLigue, PDO::PARAM_STR);
            $queryPrepa2->bindParam(":liensite", $lienSite, PDO::PARAM_STR);
            $queryPrepa2->bindParam(":descriptif", $description, PDO::PARAM_STR);
            $queryPrepa2->execute();
            // Facultatif : Vous pouvez renvoyer un message de succès ou de confirmation
            return "Ligue mise à jour avec succès";
        } else {
            // La ligue n'existe pas, vous pouvez renvoyer un message d'erreur
            return "Ligue introuvable. Mise à jour impossible.";
        }
    }*/
    
        // Fonction pour enregistrer une ligue
    public static function enregistrerLigue($nomLigue,$lienSite,$description){
        $queryPrepa = DBConnex::getInstance()->prepare("INSERT INTO ligue (NOMLIGUE, LIENSITE, DESCRIPTIF) VALUES (:nomLigue,:lienSite,:descriptif)");
        $queryPrepa->bindParam(":nomLigue", $nomLigue);
        $queryPrepa->bindParam(":lienSite", $lienSite);
        $queryPrepa->bindParam(":descriptif", $description);
        $queryPrepa->execute();
    }
        // Fonction pour modifier une ligue
        public static function modifierLigue($idLigue, $nomLigue, $lienSite, $descriptif){
            $queryPrepa = DBConnex::getInstance()->prepare("UPDATE ligue SET NOMLIGUE=:nomligue, LIENSITE=:liensite, DESCRIPTIF=:descriptif WHERE IDLIGUE=:idligue");
            $queryPrepa->bindParam(":nomligue", $nomLigue);
            $queryPrepa->bindParam(":liensite", $lienSite);
            $queryPrepa->bindParam(":descriptif", $descriptif);
            $queryPrepa->bindParam(":idligue", $idLigue);
            $queryPrepa->execute();
        }
    }        