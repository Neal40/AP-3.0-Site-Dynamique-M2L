<?php
class demandeDAO{
    public static function lesDemandes(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `demander` ORDER BY IDFORMA");
       
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
        
        if(!empty($liste)){
            foreach($liste as $demande){
                $uneDemande = new demande(null,null, null);
                $uneDemande->hydrate($demande);
                $result[] = $uneDemande;
            }
        }
        return $result;
    }

    public static function lesDemandesById($unIdUser){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM `demander` WHERE IDUSER = :unIdUser ORDER BY IDFORMA");
        $requetePrepa->bindParam( ":unIdUser", $unIdUser);
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
        
        if(!empty($liste)){
            foreach($liste as $demande){
                $uneDemande = new demande(null,null, null);
                $uneDemande->hydrate($demande);
                $result[] = $uneDemande;
            }
        }
        return $result;
    }

    public static function ajoutDemande($unIdForma, $unIdUser, $unEtat){
        $requetePrepa = DBConnex::getInstance()->prepare('INSERT INTO demander (IDFORMA, IDUSER, ETAT) VALUES (:unIdForma, :unIdUser, :unEtat);');
        $requetePrepa->bindParam( ":unIdForma", $unIdForma);
        $requetePrepa->bindParam( ":unIdUser", $unIdUser);
        $requetePrepa->bindParam( ":unEtat", $unEtat);

        $requetePrepa->execute();
    }

    public static function compteNbParForma($unIdForma){
        $requetePrepa = DBConnex::getInstance()->prepare("select COUNT(*) from demander where IDFORMA = :unIdFormation");
        $requetePrepa->bindParam( ":unIdFormation", $unIdForma);
        
       $requetePrepa->execute();

       $formation = $requetePrepa->fetch();
    }

    public static function getUserIdByFormationId($unIdForma){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT IDUSER from demander where IDFORMA = :unIdFormation");
        $requetePrepa->bindParam( ":unIdFormation", $unIdForma);
        
       $requetePrepa->execute();

       $formation = $requetePrepa->fetch();;
       return $formation;
    }











































    
}