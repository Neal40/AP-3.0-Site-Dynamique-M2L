<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<?php 
			$formulaireClub->afficherFormulaire(); 
			require_once 'controleur/controleurClubs.php';
        ?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>