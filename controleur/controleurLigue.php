<?php 
$formulaireLigue = new Formulaire('post', 'index.php', 'fLigue', 'fLigue');
$_SESSION['listeLigues'] = new ligues(LigueDAO::getLigueByNom($_SESSION["nomLigue"]));

var_dump($_SESSION['listeLigues']);
die();

if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "F2"){
    $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Identifiant :', "z"),1);
    $formulaireLigue->ajouterComposantTab();
}
   
if(isset($_POST['supprimerLigue'])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
    LigueDAO::supprimerLigue($_POST['NomLigue']);
		// Rediriger l'utilisateur vers la page des ligues 
        header('Location: index.php?m2lMP=ligues');
} 

if(isset($_POST['enregistrer_modif_ligue'])) {
    $m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";

    // Appelez la fonction pour enregistrer les modifications de la ligue
    LigueDAO::modifierLigue($_POST['IdLigue2'],$_POST['NomLigue2'], $_POST['LienSite2'], $_POST['Descriptif2']);
		// Rediriger l'utilisateur vers la page des ligues 
        header('Location: index.php?m2lMP=ligues');    
}

if(isset($_POST['annuler_liste_ligue'])){
    header('Location: index.php?m2lMP=ligues');    
}


if(!isset($_POST['modifierLigue'])) {
    foreach ($_SESSION['listeLigues']->getListeLigues() as $uneLigue){

        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("NomLigue", "NomLigue", $uneLigue->getNomLigue(), 0, "Nom de la ligue", 1));
        $formulaireLigue->ajouterComposantTab();
        $formulaireLigue->ajouterComposantTab();
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("LienSite", "LienSite", $uneLigue->getLienSite(), 0, "Lien du site web de la ligue", 1));
        $formulaireLigue->ajouterComposantTab();
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("Descriptif", "Descriptif", $uneLigue->getDescriptif(), 0, "Description de la ligue", 1));
        $formulaireLigue->ajouterComposantTab();
            //Ajouter les clubs affiliés à une ligue avec l'ID
        $_SESSION['listeClubs'] = new clubs(ClubDAO::getClubsByLigue($uneLigue->getIdLigue()));
        //$formulaireLigue->ajouterComposantLigne($formulaireLigue->creerMessage("Liste_Clubs", "<p> Liste des clubs affiliés :<p>"), 1);

            // Si une ligue n'a pas de club affilié à la ligue
        if (count($_SESSION['listeClubs']->getListeClubs()) === 0) {
            //$formulaireLigue->ajouterComposantLigne($formulaireLigue->creerMessage("Liste_Clubs", "<p> Aucun club affilié à cette ligue<p>"), 1); 
        }

        foreach ($_SESSION['listeClubs']->getListeClubs() as $unClub){
            $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerMessage("Nom du club", "<p> Nom du club :<p>"), 1);
            $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("nomClub", "nomClub", $unClub->getNomClub(), 0, "Nom du club", 1));
            $formulaireLigue->ajouterComposantTab();
            $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerMessage("Adresse du club", "<p> Adresse du club :<p>"), 1);
            $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("AdresseClub", "AdresseClub", $unClub->getAdresseClub(), 0, "Adresse du club", 1));
            $formulaireLigue->ajouterComposantTab();
        }
        $formulaireLigue->ajouterComposantTab();
            //Bouton Annuler
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputSubmit("annuler_liste_ligue","annuler_liste_ligue","Annuler"));
        $formulaireLigue->ajouterComposantTab();
            //Bouton Supprimer
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputSubmit("supprimerLigue","supprimerLigue","Supprimer"));
        $formulaireLigue->ajouterComposantTab();
            //Bouton Modifier
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputSubmit("modifierLigue","modifierLigue","Modifier"));
        $formulaireLigue->ajouterComposantTab();
    }
}
else {
    foreach ($_SESSION['listeLigues']->getListeLigues() as $uneLigue){
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputHidden("IdLigue2", "IdLigue2", $uneLigue->getIdLigue()));
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("NomLigue2", "NomLigue2", $uneLigue->getNomLigue(), 0, "Nom de la ligue", 0));
        $formulaireLigue->ajouterComposantTab();
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("LienSite2", "LienSite2", $uneLigue->getLienSite(), 0, "Lien du site web de la ligue", 0));
        $formulaireLigue->ajouterComposantTab();
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputTexte("Descriptif2", "Descriptif2", $uneLigue->getDescriptif(), 0, "Description de la ligue", 0));    
        $formulaireLigue->ajouterComposantTab();
        

            //Bouton Annuler
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputSubmit("annuler_modif_ligue","annuler_modif_ligue","Annuler"));
        $formulaireLigue->ajouterComposantTab();
            //Bouton Enregistrer les modifications faite sur une ligue
        $formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputSubmit("enregistrer_modif_ligue","enregistrer_modif_ligue","Enregistrer"));
        $formulaireLigue->ajouterComposantTab();    
    }      
}

$formulaireLigue->creerFormulaire($_SESSION['listeLigues']);

require_once "vue/vueLigue.php";