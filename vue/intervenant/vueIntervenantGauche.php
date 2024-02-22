<nav class="sidenav">
<h3 class="titreListe">Les intervenants</h3>
	<ul>

<?php 

$_SESSION['listeintervenant'] = new LesutilisateursDTO(UtilisateurDAO::LesIntervenants());
foreach ($_SESSION['listeintervenant']->getIntervenant() as $unIntervanant){
    echo "<li><a href='?action=afficher&utilisateur=".$unIntervanant->getIDUSER()."'>". $unIntervanant->getNOM()."</a></li>";

}
?>
    
</ul>
</nav>