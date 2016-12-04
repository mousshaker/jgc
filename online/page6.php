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
<?php echo $page6; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="contenu">
		<div style="overflow-x:auto;">
			<div class="blocText">
				En cliquant sur AFFICHER / MASQUER, vous trouverez des exemples de clichés pouvant vous inspirer pour vos réalisations de gages "online".
			</div>
			<?php
			echo '</br>______________________________________
			</br> Pour rappel, vous pouvez afficher la liste des gages '.$page8.'s possibles : <button class="show">'.$showHide.'</button></br></br><p>';
			#Tableau Femme
			echo '<table><tr>';
			for($i=1;$i<=sizeof($aGageSampleGirl);$i++){
				echo '<td>F '.$i.'</td>';
			}
			echo '</tr><tr>';
			for($i=1;$i<=sizeof($aGageSampleGirl);$i++){
				echo '<td><img src="'.$aGageSampleGirl[$i].'" class="illuGage"></td>';
			}
			echo '</tr></table>';

			#Tableau Homme
			echo '<table><tr>';
			for($i=1;$i<=sizeof($aGageSampleMan);$i++){
				echo '<td>M '.$i.'</td>';
			}
			echo '</tr><tr>';
			for($i=1;$i<=sizeof($aGageSampleMan);$i++){
				echo '<td><img src="'.$aGageSampleMan[$i].'" class="illuGage"></td>';
			}
			echo '</tr></table>';
			?>
		</div>
	</div>
</div>




