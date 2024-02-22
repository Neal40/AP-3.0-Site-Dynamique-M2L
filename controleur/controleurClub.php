<?php
$formulaireClub = new Formulaire('post', 'index.php', 'fClub', 'fClub');
$_SESSION['listeClubs'] = new clubs(ClubDAO::getClubByNom($_SESSION["nomClub"]));


if($_SESSION["identification"] == null){
    if(UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "responsable_formation"){
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerLabel('Identifiant :', "z"),1);
        $formulaireClub->ajouterComposantTab();
    }
}


if(isset($_POST['supprimerClub'])){
	$m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
    ClubDAO::supprimerClub(($_POST['NomClub']));
		// Rediriger l'utilisateur vers la page des clubs
        header('Location: http://10.100.0.6/~rducom/AP/1/site-m-2-l-dynamique-m-2-l-g-3-20231014T130509Z-001/site-m-2-l-dynamique-m-2-l-g-3/index.php?m2lMP=clubs');
} 


if(isset($_POST['enregistrer_modif_club'])) {
    $m2lMPFromURL = isset($_GET['m2lMP']) ? $_GET['m2lMP'] : "";
    // Appelez la fonction pour enregistrer les modifications du club
    ClubDAO::enregistrerClub($_POST['IdLigue2'],$_POST['IdCommune2'],$_POST['NomClub2'], $_POST['AdresseClub2']);
   header('Location: http://10.100.0.6/~rducom/AP/1/site-m-2-l-dynamique-m-2-l-g-3-20231014T130509Z-001/site-m-2-l-dynamique-m-2-l-g-3/index.php?m2lMP=clubs');
}

if(isset($_POST['annuler_liste_club'])){
    header('Location: http://10.100.0.6/~rducom/AP/1/site-m-2-l-dynamique-m-2-l-g-3-20231014T130509Z-001/site-m-2-l-dynamique-m-2-l-g-3/index.php?m2lMP=clubs');    
}



if(!isset($_POST['modifierClub'])) {
    foreach ($_SESSION['listeClubs']->getListeClubs() as $unClub){
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Id de la ligue"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("IdLigue", "IdLigue", $unClub->getIdLigue(), 0, "ID Ligue du Club", 1));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Commune du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("IdCommune", "IdCommune", $unClub->getIdCommune(), 0, "ID Commune du Club", 1));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Nom du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("NomClub", "NomClub", $unClub->getNomClub(), 0, "Nom du Club", 1));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Adresse du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("AdresseClub", "AdresseClub", $unClub->getAdresseClub(), 0, "Adresse du club", 1));
        $formulaireClub->ajouterComposantTab();
            //Bouton Supprimer
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("supprimerClub","supprimerClub","Supprimer"));
        $formulaireClub->ajouterComposantTab();
            //Bouton Modifier
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("modifierClub","modifierClub","Modifier"));
        $formulaireClub->ajouterComposantTab(); 
    }
}
else {
    foreach ($_SESSION['listeClubs']->getListeClubs() as $unClub){
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Id de la ligue"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("IdLigue2", "IdLigue2", $unClub->getIdLigue(), 0, "ID Ligue du Club", 0));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Commune du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("IdCommune2", "IdCommune2", $unClub->getIdCommune(), 0, "ID Commune du Club", 0));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Nom du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("NomClub2", "NomClub2", $unClub->getNomClub(), 0, "Nom du Club", 0));
        $formulaireClub->ajouterComposantTab();
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerMessage("Adresse du club"), 1);
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("AdresseClub2", "AdresseClub2", $unClub->getAdresseClub(), 0, "Adresse du club", 0));
        $formulaireClub->ajouterComposantTab();
            //Bouton Annuler
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("annuler_liste_club","annuler_liste_club","Annuler"));
        $formulaireClub->ajouterComposantTab();
            //Bouton Enregistrer les modifications faite sur un club
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("enregistrer_modif_club","enregistrer_modif_club","Enregistrer"));
        $formulaireClub->ajouterComposantTab();    
    }      
}

$formulaireClub->creerFormulaire($_SESSION['listeClubs']);

require_once "vue/vueClub.php";