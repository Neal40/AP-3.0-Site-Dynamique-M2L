<?php 
$formulaireListeDemande = new Formulaire('post', 'index.php', 'fDemande', 'fDemande');


$_SESSION['listeDemandes'] = new demandes(demandeDAO::lesDemandes());


if(isset($_GET['demande'])){
	$_SESSION['demande']= $_GET['demande'];
}
else
{
	if(!isset($_SESSION['IDformation'])){
		$_SESSION['IDformation'] = "0";
	}
}


$demandeActive = $_SESSION['listeDemandes']->chercheDemandes($_SESSION['demande']);

if($demandeActive != null){
	$formationActive = formationDAO::getFormationByID($_SESSION['demande']);

	$infoUti = UtilisateurDAO::getInfoUtilisateurById($demandeActive->getIDUSER());
	$_SESSION['IDUSER'] = $demandeActive->getIDUSER();
	if(UtilisateurDAO::getFonctionbyId(UtilisateurDAO::getIdByLogin($_SESSION['login'])) === "responsable_formation" && $demandeActive->getETAT() == "en attente"){
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Description de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Intitule de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("intituleFormation", "intituleFormation", $formationActive['INTITULE'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Descriptif de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation", $formationActive['DESCRIPTIF'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Duree de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", $formationActive['DUREE'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Date d\'ouverture de l\'inscription :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", $formationActive['DATEOUVERTINSCRIPTIONS'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Date de cloture de l\'inscription :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", $formationActive['DATECLOTUREINSCRIPTIONS'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Effectif de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", $formationActive['EFFECTIF'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Etat de la demande :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("etatDemande", "etatDemande", $demandeActive->getETAT(), "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Utilisateur :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("userInfo", "userInfo", $infoUti[0]['NOM']. " ". $infoUti[0]['PRENOM'], "1", "", "1"));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputSubmit("btnValiderDemande", "btnValiderDemande", "Accepter"));
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputSubmit("btnRefuserDemande", "btnRefuserDemande", "Refuser"));
		$formulaireListeDemande->ajouterComposantTab();
	}
	else{
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Description de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Intitule de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("idFormation", "idFormation", $formationActive['INTITULE'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Descriptif de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation", $formationActive['DESCRIPTIF'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Duree de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", $formationActive['DUREE'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Date d\'ouverture de l\'inscription :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", $formationActive['DATEOUVERTINSCRIPTIONS'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Date de cloture de l\'inscription :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", $formationActive['DATECLOTUREINSCRIPTIONS'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Effectif de la formation :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", $formationActive['EFFECTIF'], "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel('Etat de la demande :'));
		$formulaireListeDemande->ajouterComposantTab();
		$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerInputTexte("etatDemande", "etatDemande", $demandeActive->getETAT(), "1", "", "1"), 1);
		$formulaireListeDemande->ajouterComposantTab();
	}
}
else{
	$formulaireListeDemande->ajouterComposantLigne($formulaireListeDemande->creerLabel("Veuillez séléctionner une formation" , "Message") , 1 );
	$formulaireListeDemande->ajouterComposantTab();
}

$formulaireListeDemande->creerFormulaire();


require_once 'vue/vueDemandes.php' ;
