<?php

$_SESSION['listeintervenant'] = new lesUtilisateursDTO(UtilisateurDAO::LesIntervenants());

$menuIntervenant = new Menu("menuIntervannt");


if(isset($_GET['utilisateur'])){
	$_SESSION['utilisateur'] = $_GET['utilisateur'];   
}
else
{
	if(!isset($_SESSION['utilisateur'])){
		$_SESSION['utilisateur']= 0;
       
	}
}

if(isset($_POST["ajouterUtilisateur"])){
    $_SESSION["utilisateur"]=0;

}


if(isset($_POST["anullerUtilisateur"])){
	$_SESSION["utilisateur"]=$_SESSION['listeintervenant']->premierUtilisateur();
}



if(isset($_POST["supprimerUtilisateur"])){
	$reponseSGBD=utilisateurDAO::UtilisateurSupprimer($_SESSION['utilisateurActif']->getIdUser());
	if($reponseSGBD){
		$_SESSION['listeintervenant']=new LesutilisateursDTO(utilisateurDAO::LesIntervenants());
		$_SESSION['utilisateur']=$_SESSION['listeintervenant']->premierUtilisateur();
	}
	
}

$utilisateurActif = $_SESSION['listeintervenant']->chercheUtilisateur($_SESSION['utilisateur']);

// echo "<br>";

if(isset($_POST["ajouterUtilisateurBDD"])){
	$reponseSGBD = UtilisateurDAO::UtilisateurAjouter($_POST["idUser"],$_POST["idFonction"],$_POST["idLigue"],$_POST["idClub"],$_POST["nom"],$_POST["prenom"],$_POST["statut"]);
	if($reponseSGBD){
		$_SESSION['listeintervenant'] = new LesutilisateursDTO(utilisateurDAO::LesIntervenants());
	}
    else{
        echo "Error";
    }
}



$formulaireGestion = new formulaire('post', 'index.php', 'fIntervenant', 'fIntervenant');

if(utilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "responsable_formation"){
    $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Identifiant :', "z"),1);
    $formulaireGestion->ajouterComposantTab();
}

if(utilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "secretaire"){
    $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Identifiant :', "z"),1);
    $formulaireGestion->ajouterComposantTab();
}


if(utilisateurDAO::getFonctionbyLogin($_SESSION["identification"])[0] == "ressource_humaine"){
   
    if ($_SESSION['utilisateur']!=0){

        if (isset($_POST["modifierUtilisateur"])){
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Nom Intervenant : '),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("nom", "nom", $utilisateurActif->getNom(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Prenom Intervenant : '),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getPrenom(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Ligue Intervenant : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("nomLigue", "nomLigue",$utilisateurActif->getIDLIGUE(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Club Intervenant : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("nomClub", "nomClub",$utilisateurActif->getIDCLUB(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Fonction : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("libelle", "libelle",$utilisateurActif->getIDFONCTION(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Statut : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("statut", "statut",$utilisateurActif->getStatut(),"1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Contrat : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("contrat", "contrat","1" , "", "0") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("enregistrerUtilisateur","enregistrerUtilisateur","Enregistrer"));
            $formulaireGestion->ajouterComposantTab();  

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("anullerUtilisateur","anullerUtilisateur","Annuler"))  ;
            $formulaireGestion->ajouterComposantTab(); 
        }
        else{
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Nom Intervenant : '),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("nom", "nom", $utilisateurActif->getNom(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Prenom Intervenant : '),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getPrenom(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();

           

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Ligue Intervenant : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getIDLIGUE(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();  

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Club Intervenant : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getIDCLUB(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();  

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Fonction : ',),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getIDFONCTION(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();  

             $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Statut Intervenant : '),1);
            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom",$utilisateurActif->getStatut(),"1" , "", "1") , 1 );
            $formulaireGestion->ajouterComposantTab();  

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("modifierUtilisateur","ModifierUtilisateur","Modifier"));
            $formulaireGestion->ajouterComposantTab();  

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("ajouterUtilisateur","AjouterUtilisateur","Ajouter"));
            $formulaireGestion->ajouterComposantTab(); 

            $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("supprimerUtilisateur","SupprimerUtilisateur","Supprimer"))  ;
            $formulaireGestion->ajouterComposantTab(); 
        }
         
       
    }   
    else{
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel("Veuillez remplir les champs pour crée un utilisateur :  "),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel("Id de l'intervenant : "),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("idUser", "idUser", "","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('ID Fonction : ',),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte(" idFonction", "idFonction","","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('ID Ligue : ',),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("idLigue", "idLigue","","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('ID Club : ',),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("idClub", "idClub","","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Nom Intervenant : '),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("nom", "nom", "","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Prenom Intervenant : '),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("prenom", "prenom", "","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Statut : '),1);
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("statut", "statut","","0" , "", "0") , 1 );
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("ajouterUtilisateurBDD","AjouterUtilisateurBDD","Ajouter"));
        $formulaireGestion->ajouterComposantTab(); 
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputSubmit("anullerUtilisateur","anullerUtilisateur","Annuler"))  ;
        $formulaireGestion->ajouterComposantTab(); 
    }  
    
}

$formulaireGestion->creerFormulaire();

require_once 'vue/vueIntervenant.php';