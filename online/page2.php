<?php
include('../header.php');

// Titre de la page
pageTitle($siteTitleShort,$page2.' ('.$online.')');

//Inclusions spécifiques à la page
include($gage_page);
?>


<div class="MenuOnline">
<?php echo $online; ?> <br>
</div>

<?php

$limit = $total_gage_page2;
$vGage=$aGageP2;



// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['resultNb'])){// Si le bouton "des" est actionné
	
	$choix=rand(1,$limit);// Alors fait un random entre 1 et 12
	
	//on efface le fichier précédant
	wLogErase($dataPath,$page2);

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,$page2,$choix);
	wLogGlobal($dataPathGlobal,$page2.' (online)',$choix);
	
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$page2);

	//$resultat="gage".$num;// le résultat sera gageN°choisi		
	$resultat=$vGage[$num];
	
}

if (isset($_POST['read'])){// Si le bouton "des" est actionné
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$page2);

	//$resultat="gage".$num;// le résultat sera gageN°choisi
	$resultat=$vGage[$num];

	//$result=$$resultat;
}

?>
<div class="levelTitle <?php echo $page2; ?>">
<?php echo $page2; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="contenu">
	<form method="post">
			<input type="submit" class="<?php echo $page2; ?>BG" name="resultNb" value="<?php echo $rollDice; ?>" class="lanceur">
	</form>
	<form method="post">
			<input type="submit" name="read" value="<?php echo $seeLastResult; ?>" class="lanceur darkButton">
	</form>
	</div>


	<div class="resultat <?php echo $page2; ?>BG">
	<?php echo $resultat.'<br>'; ?>
	</div>

	<?php
	echo '</br>______________________________________
	</br> Pour rappel, vous pouvez afficher la liste des gages '.$page2.'s possibles : <button class="show">'.$showHide.'</button></br></br><p>';

	for($i=0;$i<$limit;$i++){
		$number=$i+1;
		//$gage="gage".$number;
		$gages=$vGage[$number];
		echo "<font size='1px'><i>[".$number."] - ".$gages."</i></font></br>";
	}
?>
</div>





