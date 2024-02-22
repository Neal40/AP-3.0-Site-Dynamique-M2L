<?php
class formationDAO{
    public static function lesFormations($unId){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM formation WHERE IDFORMA NOT IN (SELECT IDFORMA FROM demander WHERE IDUSER = :idUser);");
        $requetePrepa->bindParam( ":idUser", $unId); 
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
        
        if(!empty($liste)){
            foreach($liste as $formation){
                $uneFormation = new formation(null,null, null, null, null, null, null);
                $uneFormation->hydrate($formation);
                $result[] = $uneFormation;
            }
        }
        return $result;
    }

    public static function lesFormationsSansID(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM formation;");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
        
        if(!empty($liste)){
            foreach($liste as $formation){
                $uneFormation = new formation(null,null, null, null, null, null, null);
                $uneFormation->hydrate($formation);
                $result[] = $uneFormation;
            }
        }
        return $result;
    }


    public static function lesFormationsById($unId){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT formation.* FROM formation, demander WHERE demander.IDUSER = :id AND formation.IDFORMA = demander.IDFORMA ORDER BY formation.IDFORMA");
        $requetePrepa->bindParam( ":id", $unId);    

        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
        
        if(!empty($liste)){
            foreach($liste as $formation){
                $uneFormation = new formation(null,null, null, null, null, null, null);
                $uneFormation->hydrate($formation);
                $result[] = $uneFormation;
            }
        }
        return $result;
    }

    public static function ajoutFormation($unIntitule, $unDescriptif, $uneDuree, $uneDateOuvertureI, $uneDateFermetureI, $unEffectif){
        $requetePrepa = DBConnex::getInstance()->prepare('INSERT INTO formation (INTITULE, DESCRIPTIF, DUREE, DATEOUVERTINSCRIPTIONS, DATECLOTUREINSCRIPTIONS, EFFECTIF) VALUES (:unItitule, :unDescriptif, :uneDuree, :uneDateOuvertureInscr, :uneDateFermetureInscr, :unEffectif);');
        $requetePrepa->bindParam( ":unItitule", $unIntitule);
        $requetePrepa->bindParam( ":unDescriptif", $unDescriptif);
        $requetePrepa->bindParam( ":uneDuree", $uneDuree);
        $requetePrepa->bindParam( ":uneDateOuvertureInscr", $uneDateOuvertureI);
        $requetePrepa->bindParam( ":uneDateFermetureInscr", $uneDateFermetureI);
        $requetePrepa->bindParam( ":unEffectif", $unEffectif);

        $requetePrepa->execute();
    }

    public static function modifFormation($unIdFormation, $unIntitule, $unDescriptif, $uneDuree, $uneDateOuvertureI, $uneDateFermetureI, $unEffectif){
        $requetePrepa = DBConnex::getInstance()->prepare('UPDATE formation SET INTITULE = :unItitule, DESCRIPTIF = :unDescriptif, DUREE = :uneDuree, DATEOUVERTINSCRIPTIONS = :uneDateOuvertureInscr, DATECLOTUREINSCRIPTIONS = :uneDateFermetureInscr, EFFECTIF = :unEffectif WHERE IDFORMA = :unIdForma;');
        $requetePrepa->bindParam( ":unIdForma", $unIdFormation);
        $requetePrepa->bindParam( ":unItitule", $unIntitule);
        $requetePrepa->bindParam( ":unDescriptif", $unDescriptif);
        $requetePrepa->bindParam( ":uneDuree", $uneDuree);
        $requetePrepa->bindParam( ":uneDateOuvertureInscr", $uneDateOuvertureI);
        $requetePrepa->bindParam( ":uneDateFermetureInscr", $uneDateFermetureI);
        $requetePrepa->bindParam( ":unEffectif", $unEffectif);

        $requetePrepa->execute();

    }

    public static function delFormation($unIdFormation){
        $requetePrepa = DBConnex::getInstance()->prepare('DELETE FROM formation WHERE IDFORMA = :unIdForma');
        $requetePrepa->bindParam( ":unIdForma", $unIdFormation);
        $requetePrepa->execute();


    }

    public static function getFormationByID($unIdFormation){
        $requetePrepa = DBConnex::getInstance()->prepare("select * from formation where IDFORMA = :unIdFormation");
        $requetePrepa->bindParam( ":unIdFormation", $unIdFormation);
        
       $requetePrepa->execute();

       $formation = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
       return $formation[0];
    }

    
}