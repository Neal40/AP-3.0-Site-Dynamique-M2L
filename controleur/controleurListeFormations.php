<?php

$formulaireListeFormations = new Formulaire('post', 'index.php', 'fFormation', 'fFormation');
$_SESSION['listeFormations'] = new formations(formationDAO::lesFormations($_SESSION['iduser']));


if(isset($_GET['formation'])){
	$_SESSION['formation']= $_GET['formation'];
}
else
{
	if(!isset($_SESSION['formation'])){
		$_SESSION['formation'] = "0";
	}
}



print_r($_SESSION['formation']);
$formationActive = $_SESSION['listeFormations']->chercheFormations($_SESSION['formation']);


if ($formationActive != null){
    if(UtilisateurDAO::getFonctionbyId(UtilisateurDAO::getIdByLogin($_SESSION['login'])) == "responsable_formation"){
        if(isset($_POST['btnAjouterForma'])){
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Intitule de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("intituleAjoutFormation", "intituleAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Descriptif de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Duree de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date d\'ouverture de l\'inscription :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date de cloture de l\'inscription :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Effectif de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", "", "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnConfirmerForma', 'btnConfirmerForma', 'Confirmer'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnAnnulerForma', 'btnAnnulerForma', 'Annuler'));
            $formulaireListeFormations->ajouterComposantTab();
        }
        else{
            if(isset($_POST['btnModifierForma'])){
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Intitule de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("intituleAjoutFormation", "intituleAjoutFormation", $formationActive->getINTITULE(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Descriptif de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation",  $formationActive->getDESCRIPTIF(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Duree de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", $formationActive->getDUREE(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date d\'ouverture de l\'inscription :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", $formationActive->getDATEOUVERTINSCRIPTIONS(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date de cloture de l\'inscription :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", $formationActive->getDATECLOTUREINSCRIPTIONS(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Effectif de la formation :'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", $formationActive->getEFFECTIF(), "0", "", "0"), 1);
            $formulaireListeFormations->ajouterComposantTab();
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnValider', 'btnValider', 'Valider'));
            $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnAnnulerForma', 'btnAnnulerForma', 'Annuler'));
            $formulaireListeFormations->ajouterComposantTab();
            }
            else{
            
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Intitule de la formation :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("idFormation", "idFormation", $formationActive->getINTITULE(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Descriptif de la formation :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation", $formationActive->getDESCRIPTIF(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Duree de la formation :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", $formationActive->getDUREE(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date d\'ouverture de l\'inscription :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", $formationActive->getDATEOUVERTINSCRIPTIONS(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date de cloture de l\'inscription :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", $formationActive->getDATECLOTUREINSCRIPTIONS(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Effectif de la formation :'));
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", $formationActive->getEFFECTIF(), "1", "", "1"), 1);
                $formulaireListeFormations->ajouterComposantTab();
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnSupprimerForma', 'btnSupprimerForma', 'Supprimer'));
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnModifierForma', 'btnModifierForma', 'Modifier'));
                $formulaireListeFormations->ajouterComposantTab();
            
                $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnAjouterForma', 'btnAjouterForma', 'Ajouter'));
                $formulaireListeFormations->ajouterComposantTab();
            }
        }
        
    }
    else{
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Intitule de la formation :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("idFormation", "idFormation", $formationActive->getINTITULE(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Descriptif de la formation :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("descriptifAjoutFormation", "descriptifAjoutFormation", $formationActive->getDESCRIPTIF(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Duree de la formation :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dureeAjoutFormation", "dureeAjoutFormation", $formationActive->getDUREE(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date d\'ouverture de l\'inscription :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateOuvertureAjoutFormation", "dateOuvertureAjoutFormation", $formationActive->getDATEOUVERTINSCRIPTIONS(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Date de cloture de l\'inscription :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("dateClotureAjoutFormation", "dateClotureAjoutFormation", $formationActive->getDATECLOTUREINSCRIPTIONS(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel('Effectif de la formation :'));
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputTexte("effectifAjoutFormation", "effectifAjoutFormation", $formationActive->getEFFECTIF(), "1", "", "1"), 1);
        $formulaireListeFormations->ajouterComposantTab();
        $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerInputSubmit('btnDemandeFormation', 'btnDemandeFormation', 'Faire une demande'));
        $formulaireListeFormations->ajouterComposantTab();

        
    }
}
else{
    $formulaireListeFormations->ajouterComposantLigne($formulaireListeFormations->creerLabel("Veuillez séléctionner une formation" , "Message") , 1 );
	$formulaireListeFormations->ajouterComposantTab();
}


$formulaireListeFormations->creerFormulaire();
require_once 'vue/vueListeFormations.php';
