<?php
class UtilisateurDAO{
        
    public static function verification(string $login, string $mdp){
        //Faire pour tout champs sauf mdp.
        $requetePrepa = DBConnex::getInstance()->prepare("select login  from utilisateur where login = :login and  mdp = :mdp");
        $requetePrepa->bindParam( ":login", $login);
        $requetePrepa->bindParam( ":mdp" ,  $mdp);
        
       $requetePrepa->execute();

       $login = $requetePrepa->fetch();
       return $login[0];
    }

    public static function getFonctionbyLogin($unLogin){
        $result = [];
        $requeteprera = DBConnex::getInstance()->prepare(" SELECT LIBELLE FROM fonction, utilisateur WHERE LOGIN = :login AND utilisateur.IDFONCTION = fonction.IDFONCTION ");
        $requeteprera->bindParam( ":login", $unLogin);  

        $requeteprera->execute();

       $login = $requeteprera->fetchAll(PDO::FETCH_NUM);
       
       return $login[0];
    }

    public static function getFonctionbyId($unId){

        $requetePrepa = DBConnex::getInstance()->prepare("select fonction.LIBELLE from utilisateur, fonction where utilisateur.IDUSER =:id AND utilisateur.IDFONCTION = fonction.IDFONCTION");

        $requetePrepa->bindParam("id", $unId);
        
        $requetePrepa->execute();

       $login = $requetePrepa->fetch(PDO::FETCH_BOTH);
       return $login['LIBELLE'];
    }

    public static function getIdByLogin($unLogin){
        $requeteprera = DBConnex::getInstance()->prepare("select IDUSER from utilisateur where LOGIN = :login;");

        $requeteprera->bindParam( ":login", $unLogin);    
        
        $requeteprera->execute();

       $login = $requeteprera->fetch(PDO::FETCH_BOTH);
       return $login['IDUSER'];
    }


    public static function UtilisateurSupprimer($IDUSER){
        $requetePrepa=DBConnex::getInstance()->prepare("DELETE FROM utilisateur WHERE IDUSER=:IDUSER");
        $requetePrepa->bindParam(':IDUSER', $IDUSER);
        return $requetePrepa->execute();
    }

    public static function UtilisateurAjouter($IDUSER,$IDFONCTION,$IDLIGUE,$IDCLUB,$nom, $prenom, $STATUT){
        $requetePrepa=DBConnex::getInstance()->prepare("INSERT INTO utilisateur (IDUSER, IDFONCTION ,IDLIGUE,IDCLUB,NOM, PRENOM,STATUT) VALUES  (:IDUSER,:IDFONCTION,:IDLIGUE,:IDCLUB,:nom, :prenom,:STATUT)");
        $requetePrepa->bindParam(':IDUSER', $IDUSER);
        $requetePrepa->bindParam(':IDFONCTION', $IDFONCTION);
        $requetePrepa->bindParam(':IDLIGUE', $IDLIGUE);
        $requetePrepa->bindParam(':IDCLUB', $IDCLUB);
        $requetePrepa->bindParam(':nom', $nom);
        $requetePrepa->bindParam(':prenom', $prenom);
        $requetePrepa->bindParam(':STATUT', $STATUT);



        $requetePrepa->execute();
    }   
    
    public static function getInfoUtilisateurById($unId){
        $requeteprera = DBConnex::getInstance()->prepare("SELECT NOM, PRENOM FROM utilisateur WHERE IDUSER = :idUser");
        $requeteprera->bindParam( ":idUser", $unId);   
        $requeteprera->execute(); 
        $result = $requeteprera->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($result)){
            foreach($result as $info){
                $resultfi[] = $info;
            }
        }
        return $resultfi;
    }

    public static function LesIntervenants(){
        $result = [];
        $requetePrepa = dBConnex::getInstance()->prepare("select * FROM utilisateur ORDER BY IDUSER");
       
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($liste)){
            foreach($liste as $intervenant){
                $unIntervenant = new utilisateurdto(null, null, null, null, null, null, null, null, null);
                $unIntervenant->hydrate($intervenant);
                $result[] = $unIntervenant;
            }
        }
        return $result;
    }

     public static function lesContrats(){
        $result = [];
        $requetePrepa = dBConnex::getInstance()->prepare("select * from `contrat`  " );
       
         $requetePrepa->execute();
         $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
    
        if(!empty($liste)){
            foreach($liste as $intervenant){
                $unIntervenant = new contratDTO(null,null,null,null,null,null);
                $unIntervenant->hydrate($intervenant);
                $result[] = $unIntervenant;
        }
        }
        return $result;
     }


     public static function lesBulletins(){
        $result = [];
         $requetePrepa = dBConnex::getInstance()->prepare("select * from `bulletin`  " );
       
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 
    
        if(!empty($liste)){
            foreach($liste as $intervenant){
            $unIntervenant = new bulletinDTO(null,null,null,null,null);
            $unIntervenant->hydrate($intervenant);
                $result[] = $unIntervenant;
            }
         }
     return $result;
     }

    




    
    
    
}