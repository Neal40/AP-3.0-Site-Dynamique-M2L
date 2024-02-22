<nav class="sidenav">
<h3 class="titreListe">Les demandes</h3>
	<ul>
	<?php 
	if(UtilisateurDAO::getFonctionbyId(UtilisateurDAO::getIdByLogin($_SESSION['login'])) === "responsable_formation"){
		$_SESSION['listeDemandes']= new demandes(demandeDAO::lesDemandes());
		foreach ($_SESSION['listeDemandes']->getDemandes() as $uneDemande){
			echo "<li><a href='?action=afficher&demande=".$uneDemande->getIDFORMA()."'>". $uneDemande->getIDFORMA()."</a></li>";
		}
	}
	else{
		$_SESSION['listeDemandes'] = new demandes(demandeDAO::lesDemandesByID(utilisateurDAO::getIdByLogin($_SESSION['login'])));
		foreach ($_SESSION['listeDemandes']->getDemandes() as $uneDemande){
			echo "<li><a href='?action=afficher&demande=".$uneDemande->getIDFORMA()."'>". $uneDemande->getIDFORMA()."</a></li>";
		}
	}


		?>

	</ul>
</nav>