<div class="conteneur">
	<header>
		 <?php include 'haut.php' ;?>
	</header>
	<main>
    	<?php
			$formulaireLigue->afficherFormulaire();
			require_once "controleur/controleurLigue.php";
		?>
		<br>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>