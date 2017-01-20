<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page2);

//Inclusions spécifiques à la page
include($gage_page);


$limit = $total_gage_page2;
$vGage=$aGageP2;



// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['resultNb'])){// Si le bouton "des" est actionné
	
	$choix=rand(1,$limit);// Alors fait un random entre 1 et 12
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,$page2);

	//on efface le fichier précédant
	wLogErase($dataPath,$page2);

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,$page2,$choix);
	wLogGlobal($dataPathGlobal,$page2,$choix);
	
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


	<!-- bandeau de résultat -->
	<div class="resultat <?php echo $page2; ?>BG">
	<?php echo $resultat.'<br>'; ?>
	</div>
	
    <!-- liste des gages -->
	<div class="marginBloc">
        Pour rappel, vous pouvez afficher la liste des gages <?php echo $page2 ?>s possibles : <button class="show"><?php echo $showHide ?></button>
    </div>
    <p>
        <?php #on affiche la liste des gages
        listGage($limit,$vGage); ?>
    </p>
    <?php #Inclusion footer
    include($footer); ?>
</div>





