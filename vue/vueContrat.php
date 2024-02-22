<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<aside>
			<nav>
				<p>Les Contrat : 
				<?php
					echo $leMenuContrat;
				?>
			</nav>
		</aside>
		<section>
			<?php
                $formulaireGestion->afficherFormulaire();

			?>	
		</section>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>