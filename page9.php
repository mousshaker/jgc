
<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<!-- Inclusion de l'icone d'onglet -->
<link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page9);

//Inclusions spécifiques à la page
include($gage_page);


$limit = 6;

$lastPlayer = '';
// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['girl'])){// Si le bouton "des" est actionné
	
	$lastPlayer = 1;
	$choix=rand(1,sizeof($aGageSampleGirl));// Alors fait un random entre 1 et 12

	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'girl');
	#on efface le fichier précédant
	wLogErase($dataPath,'girl');

	#on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,'girl','F '.$choix);
	wLogGlobal($dataPathGlobal,'girl','F '.$choix);

	$resultat=$aGageSampleGirl[$choix];
	
}

if (isset($_POST['man'])){// Si le bouton "des" est actionné
	$lastPlayer = 2;

	$choix=rand(1,sizeof($aGageSampleMan));// Alors fait un random entre 1 et 12

	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'man');

	#on efface le fichier précédant
	wLogErase($dataPath,'man');

	#on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,'man','M '.$choix);
	wLogGlobal($dataPathGlobal,'man','M '.$choix);

	$resultat=$aGageSampleMan[$choix];
}

if(isset($_POST['erase'])){
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'girl');
	wLogRead($dataPath,'man');
	
	//on efface le fichier précédant
	wLogErase($dataPath,'girl');
	wLogErase($dataPath,'man');
}

//on récupère le numéro du gage inscrit dans les logs
$count1 = wLogRead($dataPath,'girl');	
$count2 = wLogRead($dataPath,'man');

?>
<div class="levelTitle illustree">
<?php echo $page9; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
	La version illustrée est, comme son nom l'indique, une liste de gages illustrés chacun en image. Il n'y a qu'à reproduire ce qu'elle montre.<br>
	Ici, les gages sont spécifiques Homme et Femme. Il faudra donc lancer le dé correspondant à l'un de ces 2 types de gages.<br>
	Pour utiliser ces gages en version 'medley', vous pourrez retrouver les 'coordonées' des gages en affichant la liste. Les gages femme ayant F+N°, les gages homme M+N°.
	</div>

	<div class="contenu">

	<form method="post">
			<input type="submit" class="illustreeBG" name="erase" value="<?php echo $erase; ?>" class="lanceur">
	</form>
	<table>
		<tr>
			<td class="tdNeutral">
				<?php if($lastPlayer==1){echo'<font class="colorBlanc tdShow">ELLE</font>';}
				else{ echo 'ELLE';}
				?>
			</td>
			<td class="tdNeutral">
				<?php if($lastPlayer==2){echo'<font class="colorBlanc tdShow">LUI</font>';}
				else{ echo 'LUI';}
				?>
			</td>
		</tr>
		<tr>
			<td class="tdNeutral">
				<form method="post" action="#result">
						<input type="submit" class="illustreeBG" name="girl" value="<?php echo $rollDice; ?>" class="lanceur">
				</form>
			</td>
			<td class="tdNeutral">
				<form method="post" action="#result">
						<input type="submit" class="illustreeBG" name="man" value="<?php echo $rollDice; ?>" class="lanceur">
				</form>
			</td>
		</tr>
		<tr>
			<td class=" CellinfoSmall">
				Résultat pour ELLE
			</td>
			<td class=" CellinfoSmall">
				Résultat pour LUI
			</td>
		</tr>
		<tr>
			<td class="tdNeutral">
				<?php echo $count1; ?>
			</td>
			<td class="tdNeutral">
				<?php echo $count2; ?>
			</td>
		</tr>
	</table>


	</div>


	<div id="result" class="resultat illustreeBG">
		<?php echo '<img src="'.$resultat.'" class="illuResultGage">'; ?>
	</div>



	<div style="overflow-x:auto;">
		
		</br>______________________________________
		</br> Pour rappel, vous pouvez afficher la liste des gages <?php echo $page8;?>s possibles :
		<a class="show" href="#hide_contenu"><?php echo $showHide;?></a></br></br>
		<div id="hide_contenu">
			<div class="tableaux">
				<table>
				<?php
				#Tableau Femme
				for($i=1;$i<=50;$i++){
					echo '<tr>';
					echo '<th>F '.$i.'</th>';
					echo '<td class="tdShow"><img src="'.$aGageSampleGirl[$i].'" class="illuGage"></td>';
					echo '<td class="tdShow"><img src="'.$aGageSampleMan[$i].'" class="illuGage"></td>';
					echo '<th>M '.$i.'</th>';
					echo '</tr>';
				}
				?>
				</table>
			</div>
			
		</div>
	</div>
</div>

<?php
include($footer);



