<?php

$formulaireClub = new Formulaire('post', 'index.php', 'fClubs', 'fClubs');
// Stocke la liste des clubs dans une variable de session
$_SESSION['listeClubs'] = new clubs(clubDAO::ListeClubs());


// Si l'utilisateur est un responsable de formation
if (UtilisateurDAO::getFonctionbyLogin($_SESSION["identification"]) == "responsable_formation") {
    // Ajout du label "Identifiant" à la ligne du formulaire
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerLabel('Identifiant :', "z"), 1);
    $formulaireClub->ajouterComposantTab();
}

// Si le formulaire 'ajouterClub' n'a pas été soumis
if (!isset($_POST['ajouterClub'])) {
    // Parcourt la liste des clubs et crée un bouton pour chaque club
    foreach ($_SESSION['listeClubs']->getListeClubs() as $unClub) {
        $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("nomClub", "nomClub", $unClub->getNomClub()));
        $formulaireClub->ajouterComposantTab();
    }
    // Bouton "Ajouter" à la fin du formulaire
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("ajouterClub", "ajouterClub", "ajouter"));
    $formulaireClub->ajouterComposantTab();

        
    //Formulaire à partir des composants précédents
    $leMenuClubs = $formulaireClub->creerFormulaire($_SESSION['listeClubs']);
} else {
    // Si le formulaire 'ajouterClub' a été soumis, on affiche les champs pour ajouter un club
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("textBoxIdLigue", "textBoxIdLigue", "", "1", "ID Ligue", "0"));
    $formulaireClub->ajouterComposantTab();
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("textBoxIdCommune", "textBoxIdCommune", "", "0", "ID Commune", "0"));
    $formulaireClub->ajouterComposantTab();
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("textBoxNomClub", "textBoxNomClub", "", "1", "Nom du club", "0"));
    $formulaireClub->ajouterComposantTab();
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputTexte("textBoxAdresseClub", "textBoxAdresseClub", "", "0", "Adresse du club", "0"));
    $formulaireClub->ajouterComposantTab();
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("annulerClub", "annulerClub", "Annuler"));
    $formulaireClub->ajouterComposantTab();
    $formulaireClub->ajouterComposantLigne($formulaireClub->creerInputSubmit("validerClub", "validerClub", "Valider"));
    $formulaireClub->ajouterComposantTab();
}

// Formulaire final
$formulaireClub->creerFormulaire();

// Inclut la vue 'vueClubs.php' pour afficher le formulaire et les clubs
require_once 'vue/vueClubs.php';

