<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<br>
			<?php
				//$formulaireLigue->afficherFormulaire(); 
				require_once 'controleur/controleurLigues.php';
			?>
		<br>
		<div class='gauche'>
			<?php include 'vue/ligues/liguesGauche.php' ;?>
		</div>

	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>