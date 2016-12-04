<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page4);

//Inclusions spécifiques à la page
include($gage_page);



$path= "data";

$nbLettre=5;
$nbChiffre=10;
//$randLetter = rand(0,count($alphabet)-1);
$randLetter = rand(0,$nbLettre-1);
$randNum=rand(1,$nbChiffre);//choix du chiffre

if (isset($_POST['chooseCombo']) OR isset($_POST['chooseLetter']) OR isset($_POST['chooseNum'])){
	//on efface le fichier mémo précédant
	wLogErase($path,$page4);

	if (isset($_POST['chooseCombo'])){// Si le bouton "chooseCombo" est actionné
		// on effectue un Random pour la lettre
		$lettre = $alphabet[$randLetter]; // $alphabet et $randLetter sont setées dans config_specifique
		$chiffe = $randNum; // randNum est setée dans config_specifique
		//on compose le choix du choix aléatoire Numérique et du choix de la Lettre
		$choix = $lettre.'-'.$chiffe; // $chiffe est setée dans config_specifique
	}

	if (isset($_POST['chooseLetter'])){// Si le bouton "chooseLetter" est actionné	
		// on effectue un Random pour la lettre
		$lettre = $alphabet[$randLetter]; // $alphabet et $randLetter sont setées dans config_specifique

		//on set la variable de résultat à afficher
		$choix = $lettre;	
	}

	if (isset($_POST['chooseNum'])){// Si le bouton "chooseLetter" est actionné
		$chiffe = $randNum;
		//on set la variable de résultat à afficher
		$choix = $chiffe;
	}

	//on écrit le nouveau résultat
	wLog($path,$page4,$choix); //dans le fichier mémo
	wLogGlobal($path,$page4,$choix); // dans les logs globaux
}



if (isset($_POST['read'])){// Si le bouton "read" est actionné
	//on récupère dernier résultat inscrit dans le fichbier mémo pour l'afficher
	$num = wLogRead($path,$page4);

	$choix=$num;
}




	
?>
<div class="levelTitle <?php echo $page4; ?>">
<?php echo $page4; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
		Ce module spécifique est prévu pour fonctionner avec le "tableau des supplices" (clic en bas de page).
		</br></br>

		Si vous n'en avez pas l'accès, vous pouvez réaliser vous-même votre propre "tableau de matrice" et utiliser la matrice paramétrable à cet effet (accessible depuis le menu -> MATRICE).
		</br></br>
		Bon jeu et douce torture, malicieux suppliciés...
	</div>

	<table class="tableBorder tableShow">
	<tr>
	<?php
		for ($j=0;$j<=$nbChiffre;$j++){
			// pour ne pas que le "0" s'affiche
			if($j!=0){
				// si le chiffre = chiffre sélectionné ou le dernier résultat
				if($j==$chiffe OR $j==$choix){
					//color le BG de la cellule
					echo "<td class='colorBlanc bgColorDarkDefault'>".$j."</td>";
				}
				else{
					echo "<td class='colorBlanc'>".$j."</td>";
				}
				
			}
			else{
				echo "<td></td>";
			}
			
		}
	?>
	</tr>

	<?php

	for ($i=0;$i<$nbLettre;$i++){
		// si la lettre = lettre sélectionnée ou le dernier résultat
		if($alphabet[$i]==$lettre OR $alphabet[$i]==$choix){
			//color le BG de la cellule
			echo "<td class='colorBlanc bgColorDarkDefault'>".$alphabet[$i]."</td>";
		}
		else{
			echo "<tr><td class='colorBlanc'>".$alphabet[$i]."</td>";
		}

		for ($j=1;$j<=$nbChiffre;$j++){
			//if($alphabet[$i]==$lettre AND $j==$chiffe){
			$line = $alphabet[$i]."-".$j;
			//echo $condition." et ".$choix;
			if($line==$choix){
				echo "<td class='infoSmall tdShow bgDefaultColor colorDarkDefault'>".$line."</td>";
			}
			else{
				echo "<td class='infoSmall tdShow colorDefault'>".$line."</td>";
			}
			
		}
		echo "</tr>";
	}
	?>
		
	</table>

	<div class="contenu">
	<form method="post">
			<input type="submit" class="<?php echo $page4; ?>BG lanceur" name="chooseCombo" value="Combo" >
			<input type="submit" class="<?php echo $page4; ?>BG lanceur" name="chooseLetter" value="A-E" >
			<input type="submit" class="<?php echo $page4; ?>BG lanceur" name="chooseNum" value="1-10" >
	</form>
	<form method="post">
			<input type="submit" name="read" value="<?php echo $seeLastResult; ?>" class="lanceur darkButton">
	</form>

	</div>


	<div class="resultat <?php echo $page4; ?>BG">
	<?php echo $choix; ?><br>
	</div>

	<div class="footer">
	Voir le <a href="<?php echo $tabloSupplice; ?>" TARGET="_blank">Tableau des supplices</a><br>
	</div>
</div>





