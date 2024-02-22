<nav class="sidenav">
<h3 class="titreListe">Les formations</h3>
	<ul>
		
	<?php
	if(UtilisateurDAO::getFonctionbyId(UtilisateurDAO::getIdByLogin($_SESSION['login'])) === "responsable_formation"){
		$_SESSION['listeFormations'] = new formations(formationDAO::lesFormationsSansID());
		foreach ($_SESSION['listeFormations']->getFormations() as $uneFormation){
			echo "<li><a href='?action=afficher&formation=".$uneFormation->getIDFORMA()."'>". $uneFormation->getINTITULE()   ."</a></li>";
		}
	}
	else{
		$_SESSION['listeFormations'] = new formations(formationDAO::lesFormations($_SESSION['iduser']));
		foreach ($_SESSION['listeFormations']->getFormations() as $uneFormation){
			echo "<li><a href='?action=afficher&formation=".$uneFormation->getIDFORMA()."'>". $uneFormation->getINTITULE()   ."</a></li>";
	}
}
		?>
	</ul>
</nav>