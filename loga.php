<?php


include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$log);
?>


<div class="wrapper" style="overflow-x:auto;">
	<!-- FORMULAIRE SELECTION MOIS + ANNEE -->
	<div class="contenu">	
		<p2>
			<div class="fontsmall">
			<br>
			Pour voir les archives des logs, choisissez le MOIS et l'ANNEE désirés<br>
			</div>
			<form method="post">
			<label>Mois</label>
				<select name="datemonth">
				<?php 
				for($i=1;$i<=12;$i++){
					if ($i==date("n")){
						?>
						<option selected="true"><?php echo date("n"); ?></option>
						<?php
					}
					else{
						?>
						<option><?php echo $i; ?></option>
						<?php
					}
					
				}
				?>
				
				</select>
			<label>Année</label>
				<select name="dateyear">
				
				
					<option> <?php echo date("Y")-1; ?></option>
					<option selected="true"> <?php echo date("Y"); ?></option>			
				</select>

			<input type="submit" name="see" value="ok" class="lanceur darkButton">
			</form>
		</p2>
	</div>
	<div class="logBg">
		<div class="log">
			<?php
			//Si on clique sur OK, alors on va lire les logs sélectionnés
			if(isset($_POST['see'])){
				$nbToErase=$_POST['dateParam'];
				wLogSeeArchive($dataPathGlobal.'/logsave',$_POST['datemonth'],$_POST['dateyear']);
			}

			?>
		</div>
	</div>
</div>