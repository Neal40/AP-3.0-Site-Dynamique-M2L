<?php


$formulaireLigues = new Formulaire('post', 'index.php', 'fLigues', 'fLigues');
$_SESSION['listeLigues'] = new ligues(ligueDAO::ListeLigues());


var_dump($_SESSION['listeLigues']);
die();

if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "responsable_formation"){
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerLabel('Identifiant :', "z"),1);
    $formulaireLigues->ajouterComposantTab();
}
if(!isset($_POST['ajouterLigue'])){
    foreach ($_SESSION['listeLigues']->getListeLigues() as $uneLigue){
        $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputSubmit("nomLigue","nomLigue",$uneLigue->getNomLigue()));
        $formulaireLigues->ajouterComposantTab();

    }
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputSubmit("ajouterLigue","ajouterLigue","Ajouter"));
    $formulaireLigues->ajouterComposantTab();
    

}
else{
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputTexte("textBoxNomLigue","textBoxNomLigue","", "1", "Nom de la ligue","0"));
    $formulaireLigues->ajouterComposantTab();
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputTexte("textBoxLienSite","textBoxLienSite","", "0", "Lien du site web ","0"));
    $formulaireLigues->ajouterComposantTab();
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputTexte("textBoxDescriptif","textBoxDescriptif","", "0", "Descriptif","0"));
    $formulaireLigues->ajouterComposantTab();
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputSubmit("annulerLigue","annulerLigue","Annuler"));
    $formulaireLigues->ajouterComposantTab();
    $formulaireLigues->ajouterComposantLigne($formulaireLigues->creerInputSubmit("validerLigue","validerLigue","Valider"));
    $formulaireLigues->ajouterComposantTab();
}

$leMenuLigues = $formulaireLigues->creerFormulaire($_SESSION['listeLigues']);

$formulaireLigues->creerFormulaire();

require_once 'vue/vueLigues.php' ;


// A FAIRE LOGIN BY FONCTIONN avec === F1 par exemple 

/*if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "secretaire"){
    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Nom :'),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Lien vers le site : '),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Présentation : '),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Liste des clubs affiliés :'),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Ajouter les informations :'),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Modifier les informations :'),1);
    $formulaireLigue->ajouterComposantTab();

    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Supprimer les informations :'),1);
    $formulaireLigue->ajouterComposantTab();

}*/
