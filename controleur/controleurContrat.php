<?php 
$_SESSION['listeContrat'] = new lesContratDTO(UtilisateurDAO::lesContrats());

$menuContrat = new Menu("menuContrat");
// $menueLigue = new Menu("menueLigue");

foreach ($_SESSION['listeContrat']->getLesCOntrats() as $unContrat){
	$menuContrat->ajouterComposant($menuContrat->creerItemLien($unContrat->getDATEDEBUT(),1));
}

if(isset($_GET['contrat'])){
	$_SESSION['contrat'] = $_GET['contrat'];
  
    
}
else
{
	if(!isset($_SESSION['contrat'])){
		$_SESSION['contrat']= 0;
       
	}
}
if(isset($_POST["ajouterUtilisateur"])){
    $_SESSION["contrat"]=0;

}
$_SESSION["contratactif"] = $_SESSION['listeContrat']->chercheContrat($_SESSION['contrat']);
$menuContrat2 = new Menu("menuContrat"); 
foreach ($_SESSION['listeContrat']->getLesContrats() as $unContrat){
	$menuContrat2->ajouterComposant($menuContrat2->creerItemLien($unContrat->getIDUSER(), $unContrat->getIDCONTRAT()));

}
$leMenuContrat = $menuContrat2->creerMenuUtilisateur($_SESSION['contrat']);




$formulaireGestion = new formulaire('post', 'index.php', 'fContrat', 'fContrat');
if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "responsable_formation"){
    $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Identifiant :', "z"),1);
    $formulaireGestion->ajouterComposantTab();
}

if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "secretaire"){
    $formulaireGestion->ajouterComposantLigne($formulaireGestion->creerLabel('Identifiant :', "z"),1);
    $formulaireGestion->ajouterComposantTab();
}

if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "ressource_humaine"){



    
    
}

$formulaireGestion->creerFormulaire();

require_once 'vue/vueContrat.php';

