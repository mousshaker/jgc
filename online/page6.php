<?php
include('../header.php');

// Titre de la page
pageTitle($siteTitleShort,$page6.' ('.$online.')');

//Inclusions spécifiques à la page
include($gage_page);



?>
<div class="MenuOnline">
<?php echo $online; ?> <br>
</div>


<div class="levelTitle <?php echo $page6; ?>">
Exemples<br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="contenu">
		<div style="overflow-x:auto;">
		
		</br>______________________________________
		</br> Pour rappel, vous pouvez afficher la liste des gages <?php echo $page8;?>s possibles :
		<a class="show" href="#hide_contenu"><?php echo $showHide;?></a></br></br>
		<div id="hide_contenu">
			<table>
			<?php
			#Tableau Femme
			for($i=1;$i<=25;$i++){
				echo '<tr>';
				echo '<th>F '.$i.'</th>';
				echo '<td class="tdShow"><img src="'.$aGageSampleGirl[$i].'" class="illuGage"></td>';
				echo '<td class="tdShow"><img src="'.$aGageSampleMan[$i].'" class="illuGage"></td>';
				echo '<th>M '.$i.'</th>';
				echo '</tr>';
			}
			?>
			</table>
			<a class="show" href="#hide_contenu">Retour haut</a>
		</div>
	</div>
	</div>
</div>




