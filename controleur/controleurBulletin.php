<?php
$_SESSION['listeBulletin'] = new lesBulletinDTO(utilisateurDAO::lesBulletins());



if(isset($_GET['bulletin'])){
	$_SESSION['bulletin'] = $_GET['bulletin'];
  
    
}
else
{
	if(!isset($_SESSION['bulletin'])){
		$_SESSION['bulletin']= 0;
       
	}
}
$bulletinActif = $_SESSION['listeBulletin']->chercheBulletin($_SESSION['bulletin']);
$formulaireGestion = new formulaire('post', 'index.php', 'fBulletin', 'fBulletin');
if($bulletinActif !== null){

    if(utilisateurDAO::getFonctionbyLogin($_SESSION["identification"])[0] === 'ressource_humaine'){
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('N°Bulletin : '),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("numBulletin", "numBulletin", $bulletinActif->getIdBulletin(), "1", "", "1"), 1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('N°Contrat : '),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("numContrat", "numContrat", $bulletinActif->getIdContrat(), "1", "", "1"), 1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Mois : '),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("moisBulletin", "moisBulletin", $bulletinActif->getMois(), "1", "", "1"), 1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Année : '),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("annéeBulletin", "annéeBulletin", $bulletinActif->getANNE(), "1", "", "1"), 1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('PDF : '),1);
        $formulaireGestion->ajouterComposantTab();
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerInputTexte("pdfBulletin", "pdfBulletin", $bulletinActif->getBULLETINPDF(), "1", "", "1"), 1);
        $formulaireGestion->ajouterComposantTab();
        
    }
    else{
        $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Il faut un autre compte.'),1);
        $formulaireGestion->ajouterComposantTab();
    }

}
$formulaireGestion->creerFormulaire();



require_once 'vue/vueBulletin.php';