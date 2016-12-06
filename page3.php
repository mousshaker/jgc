<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page3);

//Inclusions spécifiques à la page
include($gage_page);


$limit = $total_gage_page3;
$vGage=$aGageP3;

// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['resultNb'])){// Si le bouton "des" est actionné
	
	$choix=rand(1,$limit);// Alors fait un random entre 1 et 12
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,$page3);
	
	//on efface le fichier précédant
	wLogErase($dataPath,$page3);

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,$page3,$choix);
	wLogGlobal($dataPathGlobal,$page3,$choix);
	
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$page3);

	//$resultat="gage".$num;// le résultat sera gageN°choisi		
	$resultat=$vGage[$num];
	
}

if (isset($_POST['read'])){// Si le bouton "des" est actionné
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$page3);

	//$resultat="gage".$num;// le résultat sera gageN°choisi
	$resultat=$vGage[$num];

	//$result=$$resultat;
}

?>
<div class="levelTitle <?php echo $page3; ?>">
<?php echo $page3; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="contenu">
	<form method="post">
			<input type="submit" class="<?php echo $page3; ?>BG" name="resultNb" value="<?php echo $rollDice; ?>" class="lanceur">
	</form>
	<form method="post">
			<input type="submit" name="read" value="<?php echo $seeLastResult; ?>" class="lanceur darkButton">
	</form>
	</div>


	<div class="resultat <?php echo $page3; ?>BG">
	<?php echo $resultat.'<br>'; ?>
	</div>

	<?php
	echo '</br>______________________________________
	</br> Pour rappel, vous pouvez afficher la liste des gages '.$page3.'s possibles : <button class="show">'.$showHide.'</button></br></br><p>';

	for($i=0;$i<$limit;$i++){
		$number=$i+1;
		//$gage="gage".$number;
		$gages=$vGage[$number];
		echo "<font size='1px'><i>[".$number."] - ".$gages."</i></font></br>";
	}

?>
</div>




