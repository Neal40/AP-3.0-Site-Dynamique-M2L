<nav class="sidenav">
<h3 class="titreListe">Les bulletins</h3>
	<ul>
	<?php 
    $_SESSION['listeBulletin'] = new lesBulletinDTO(utilisateurDAO::lesBulletins());
	foreach ($_SESSION['listeBulletin']->getlesBulletins() as $unBulletin){
        echo "<li><a href='?action=afficher&bulletin=".$unBulletin->getIdBulletin()."'>". $unBulletin->getIdContrat()."</a></li>";
    }


		?>

	</ul>
</nav>