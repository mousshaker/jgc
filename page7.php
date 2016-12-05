
<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<!-- Inclusion de l'icone d'onglet -->
<link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page7);

//Inclusions spécifiques à la page
include($gage_page);


$limit = 6;

$lastPlayer = '';
// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['joueur1'])){// Si le bouton "des" est actionné
	
	$lastPlayer = 1;
	$choix1=rand(1,$limit);// Alors fait un random entre 1 et 12
	$choix2=rand(1,$limit);

	$resultat=$choix1+$choix2;
	$oldScore = wLogRead($dataPath,'joueur1');
	if($oldScore < 21){
		$newScore = $oldScore+$resultat;
	}
	if($oldScore > 21){
		$newScore = $oldScore-$resultat;
	}

	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'joueur1');
	
	//on efface le fichier précédant
	wLogErase($dataPath,'joueur1');

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,'joueur1',$newScore);
	wLogGlobal($dataPathGlobal,'joueur1',$newScore);

	unset($newScore);
	unset($oldScore);
	
}

if (isset($_POST['joueur2'])){// Si le bouton "des" est actionné
	$lastPlayer = 2;

	$choix1=rand(1,$limit);// Alors fait un random entre 1 et 12
	$choix2=rand(1,$limit);

	$resultat=$choix1+$choix2;
	$oldScore = wLogRead($dataPath,'joueur2');
	if($oldScore < 21){
		$newScore = $oldScore+$resultat;
	}
	if($oldScore > 21){
		$newScore = $oldScore-$resultat;
	}

	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'joueur1');
	
	//on efface le fichier précédant
	wLogErase($dataPath,'joueur2');

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,'joueur2',$newScore);
	wLogGlobal($dataPathGlobal,'joueur2',$newScore);
	
	//on récupère le numéro du gage inscrit dans les logs
	
	unset($newScore);
	unset($oldScore);
}
if(isset($_POST['erase'])){
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,'joueur1');
	wLogRead($dataPath,'joueur2');

	//on efface le fichier précédant
	wLogErase($dataPath,'joueur1');
	wLogErase($dataPath,'joueur2');
}

//on récupère le numéro du gage inscrit dans les logs
$count1 = wLogRead($dataPath,'joueur1');	
$count2 = wLogRead($dataPath,'joueur2');

?>
<div class="levelTitle le_21">
<?php echo $page7; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
	Le jeu du 21 est très simple : 1 lancé de deux dés à 6 faces. A chaque lancé, on additionne les résultats des 2 dés, qu'on ajoute au résultat précédant (compteur). Le but est d'arriver en premier à 21 EXACTEMENT.</br>
	Si la somme des 2 dés lancés, additionnée au résultat du compteur, dépasse 21, alors cette somme est soustraite. Si ça ne dépasse pas 21, alors c'est ajouté. Et vis et versa.</br>
	Essayez, vous verrez !
	</div>

	<div class="contenu">

	<form method="post">
			<input type="submit" class="le_21BG" name="erase" value="<?php echo $erase; ?>" class="lanceur">
	</form>
	<table>
		<tr>
			<td class="tdNeutral">
				<?php if($lastPlayer==1){echo'<font class="colorBlanc">JOUEUR 1</font>';}
				else{ echo 'JOUEUR 1';}
				?>
			</td>
			<td class="tdNeutral">
				<?php if($lastPlayer==2){echo'<font class="colorBlanc">JOUEUR 2</font>';}
				else{ echo 'JOUEUR 2';}
				?>
			</td>
		</tr>
		<tr>
			<td class="tdNeutral">
				<form method="post" action="#result">
						<input type="submit" class="le_21BG" name="joueur1" value="<?php echo $rollDice; ?>" class="lanceur">
				</form>
			</td>
			<td class="tdNeutral">
				<form method="post" action="#result">
						<input type="submit" class="le_21BG" name="joueur2" value="<?php echo $rollDice; ?>" class="lanceur">
				</form>
			</td>
		</tr>
		<tr>
			<td class=" CellinfoSmall">
				Compteur J1
			</td>
			<td class=" CellinfoSmall">
				Compteur J2
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


	<div id="result" class="resultat le_21BG">
		<?php echo $resultat.'<br>'; 
		if(isset($_POST['joueur1']) OR isset($_POST['joueur2'])){
			echo '<font class="resultSecondary">(1er Dé : '.$choix1.' | 2nd Dé : '.$choix2.')</font><br>';
		}
		if($count1==21){
			echo 'JOUEUR 1 GAGNE !<br>';
		}
		if($count2==21){
			echo 'JOUEUR 2 GAGNE !';
		}?>

	</div>

</div>
<?php
include($footer);



