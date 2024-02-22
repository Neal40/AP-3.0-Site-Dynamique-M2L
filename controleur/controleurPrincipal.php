<?php

$messageErreurConnexion="";

if(isset($_POST["submitConnex"])){
	$verif = UtilisateurDAO::verification($_POST['login'], $_POST['mdp']);

	if($verif){
		$_SESSION["identification"] = $verif;
		$_SESSION['m2lMP'] ="accueil";
		$_SESSION['login'] = $_POST['login'];
	}
	else{
		$messageErreurConnexion = "login ou password incorrect";

	}
}
else{
	if(!isset($_SESSION["identification"])){
		$_SESSION['identification']=false;
	}
}


if(isset($_GET['m2lMP'])){
	$_SESSION['m2lMP']= $_GET['m2lMP'];
}
else
{
	if(!isset($_SESSION['m2lMP'])){
		$_SESSION['m2lMP']="accueil";
	}
}

// LIGUES

	//Récupère la valeur de nomLigue dans la session nomLigue
if(isset($_POST["nomLigue"])){
	$_SESSION['m2lMP']="Ligue";
	$_SESSION['nomLigue'] = $_POST["nomLigue"];
}


if(isset($_POST["validerLigue"])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
		//Récupère les valeurs dans différents champs pour ajouter une ligue 
	LigueDAO::ajouterLigue($_POST['textBoxNomLigue'],$_POST['textBoxLienSite'],$_POST['textBoxDescriptif']);
		// Rediriger l'utilisateur vers la page des ligues 
	header('Location: index.php?m2lMP=ligues');
}

if(isset($_POST['supprimerLigue'])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
		//Récupère la valeur de nomLigue pour supprimer une ligue 
	$_SESSION['DeleteUneLigue'] = new ligues(LigueDAO::supprimerLigue(($_POST['NomLigue'])));
		// Rediriger l'utilisateur vers la page des ligues 
	header('Location: index.php?m2lMP=ligues');
	} 

// CLUBS

	//Récupère la valeur de nomClub dans la session nomClub
if(isset($_POST["nomClub"])){
	$_SESSION['m2lMP']="Club";
	$_SESSION['nomClub'] = $_POST["nomClub"];
}

	//Récupère les valeurs dans différents champs pour ajouter un club 
if(isset($_POST["validerClub"])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
		//Récupère les valeurs dans différents champs pour ajouter un club 
	ClubDAO::ajouterClub($_POST['textBoxIdLigue'],$_POST['textBoxIdCommune'],$_POST['textBoxNomClub'],$_POST['textBoxAdresseClub']);
	// Rediriger l'utilisateur vers la page des clubs 
	header('Location: http://10.100.0.6/~rducom/AP/1/site-m-2-l-dynamique-m-2-l-g-3-20231014T130509Z-001/site-m-2-l-dynamique-m-2-l-g-3/index.php?m2lMP=clubs');
}

	//Récupère la valeur de nomLigue pour supprimer un club
if(isset($_POST['supprimerClub'])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
	ClubDAO::supprimerClub(($_POST['NomClub']));
	// Rediriger l'utilisateur vers la page des clubs
	header('Location: http://10.100.0.6/~rducom/AP/1/site-m-2-l-dynamique-m-2-l-g-3-20231014T130509Z-001/site-m-2-l-dynamique-m-2-l-g-3/index.php?m2lMP=clubs');
}

	

//Tester la connexion 





if(isset($_POST['btnValider'])){
    formationDAO::modifFormation($_SESSION['formation'], $_POST['intituleAjoutFormation'], $_POST['descriptifAjoutFormation'], $_POST['dureeAjoutFormation'], $_POST['dateOuvertureAjoutFormation'], $_POST['dateClotureAjoutFormation'], $_POST['effectifAjoutFormation']);
}

if(isset($_POST['btnConfirmerForma'])){
    formationDAO::ajoutFormation( $_POST['intituleAjoutFormation'], $_POST['descriptifAjoutFormation'], $_POST['dureeAjoutFormation'], $_POST['dateOuvertureAjoutFormation'], $_POST['dateClotureAjoutFormation'], $_POST['effectifAjoutFormation']);
}

if(isset($_POST['btnSupprimerForma'])){
	formationDAO::delFormation($_SESSION['formation']);
}

if(isset($_POST['btnDemandeFormation'])){
	demandeDAO::ajoutDemande($_SESSION['formation'], UtilisateurDAO::getIdByLogin($_SESSION['login']), "en attente");
}

//Tester la connexion 


$m2lMP = new Menu("m2lMP");
if($_SESSION['identification'] == false){
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("clubs", "Clubs"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("connexion", "Se connecter"));
}
 else {
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("clubs", "Clubs"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("intervenant", "Intervenant"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("contrat", "Contrat"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("bulletin", "Bulletin"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("demandes", "L Demandes"));	
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("listeFormations", "L Formations"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("connexion", "Deconnexion"));
}

$menuPrincipalM2L = $m2lMP->creerMenu($_SESSION['m2lMP'],'m2lMP');

//var_dump($_SESSION['m2lMP']);

include_once dispatcher::dispatch($_SESSION['m2lMP']);




 