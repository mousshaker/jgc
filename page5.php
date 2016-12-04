<meta name="viewport" content="width=device-width, maximum-scale=1"/>
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page5);


$path= "data";

//on va chercher dans les fichiers mémos la dernière valeur enregistrée
$nbLettre = wLogRead($dataPathGlobal,'matriceLettre');
$nbChiffre = wLogRead($dataPathGlobal,'matriceChiffre');

$randLetter = rand(0,$nbLettre-1);
$randNum=rand(1,$nbChiffre);//choix du chiffre

if (isset($_POST['chooseCombo']) OR isset($_POST['chooseLetter']) OR isset($_POST['chooseNum'])){
	//on efface le fichier mémo précédant
	wLogErase($path,$page5);

	if (isset($_POST['chooseCombo'])){// Si le bouton "chooseCombo" est actionné
		// on effectue un Random pour la lettre (en allant chercher dans le tablo $alphabet)
		$lettre = $alphabet[$randLetter]; // $alphabet est setée dans config
		$chiffe = $randNum;
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
	wLog($path,$page5,$choix); //dans le fichier mémo
	wLogGlobal($path,$page5,$choix); // dans les logs globaux
}


if (isset($_POST['paramMatrice'])){
		if (isset($_POST['nbLettre']) && $_POST['nbLettre']!="" ){
			wChangeNameInLogGlobal($dataPathGlobal,'change le nb de lettres de la matrice',$nbLettre,$_POST['nbLettre']);
			wLogErase($dataPathGlobal,'matriceLettre');
			wLog($dataPathGlobal,'matriceLettre',$_POST['nbLettre']);
			$nbLettre = $_POST['nbLettre'];

		}
		if (isset($_POST['nbChiffre'])&& $_POST['nbChiffre']!=""){
			wChangeNameInLogGlobal($dataPathGlobal,'change le nb de chiffres de la matrice',$nbChiffre,$_POST['nbChiffre']);
			wLogErase($dataPathGlobal,'matriceChiffre');
			wLog($dataPathGlobal,'matriceChiffre',$_POST['nbChiffre']);
			$nbChiffre = $_POST['nbChiffre'];

		}	

		$messageAction = "Changement effectué";
}



if (isset($_POST['read'])){// Si le bouton "read" est actionné
	//on récupère dernier résultat inscrit dans le fichbier mémo pour l'afficher
	$num = wLogRead($path,$page5);

	$choix=$num;
}




	
?>
<div class="levelTitle <?php echo $page5; ?>">
<?php echo $page5; ?><br>
</div>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
		Ce module spécifique est prévu pour fonctionner avec une matrice externe de gages (un tableau de gages, par exemple) afin d'en sélectionner aléatoirement des coordonnées (composé d'un CHIFFRE et une LETTRE).<br>
		Si vous en avez l'accès, vous pouvez utiliser le <a href="<?php echo $tabloSupplice; ?>" TARGET="_blank">Tableau des supplices</a>  qui est un modèle déjà existant de matrice de gages.
		</br>
		En ce cas, rendez-vous dans la rubrique spécifique du supplice (accessible depuis le sous-menu).
		</br></br>

		Sinon, vous pouvez réaliser vous-même votre propre "tableau de matrice" (un fichier excel, par exemple avec en colonne les chiffres, en ligne les lettres : <a href="<?php echo $matriceModele; ?>" TARGET="_blank">voir un modèle</a>).
		<br>
		Vous n'avez qu'à remplir les cellules intérieures par la description de gages de votre choix; ou même, comme c'est le cas pour le "Tableau des supplices", d'images explicitant le gage.
		</br>
		Les chiffres (en abscisses) pourraient correspondre aux variantes possibles des gages; les lettres (en ordonnées) pourraient correspondre au niveau de difficulté/intensité des gages.
		</br></br>
		Ce module vous permettra ensuite de choisir aléatoirement un gage inscrit dans votre tableau de matrice, en fonction de son emplacement.
		</br></br>

		Enfin, grâce à cette matrice paramétrable en fonction de votre tableau, vous avez la possibilité de choisir aléatoirement, soit un <b>combo</b> de LETTRE-CHIFFRE, soit uniquement la LETTRE ou, enfin, uniquement le CHIFFRE.
		</br></br>

		Bon jeu !
	</div>

	<!-- PERSONNALISATION DE LA MATRICE -->
	<div class="contenu">
	<input type="submit" value="Paramétrer la matrice" class="show blackButton">

		<p3>
			<form method="post">
			<label>Nb de lettres</label><input type="text" name="nbLettre" placeholder="<?php echo $nbLettre; ?>" size="2">
			<label>Nb de chiffres</label><input type="text" name="nbChiffre" placeholder="<?php echo $nbChiffre; ?>" size="2">
			<input type="submit" name="paramMatrice" value="ok" class="lanceur darkButton">
			</form>
		</p3>
	</div>



	<!-- MATRICE -->
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

	<!-- formulaire de choix aléatoire -->
	<div class="contenu">
	<form method="post" action="#result">
			<input type="submit" class="<?php echo $page5; ?>BG lanceur darkButton" name="chooseCombo" value="Combo">
			<input type="submit" class="<?php echo $page5; ?>BG lanceur darkButton" name="chooseLetter" value="A-<?php echo $alphabet[$i-1]; ?>">
			<input type="submit" class="<?php echo $page5; ?>BG lanceur darkButton" name="chooseNum" value="1-<?php echo $j-1; ?>">
	</form>
	<form method="post">
			<input type="submit" name="read" value="<?php echo $seeLastResult; ?>" class="lanceur darkButton">
	</form>

	</div>


	<!-- résultat -->
	<div id="result" class="resultat <?php echo $page5; ?>BG">
	<?php echo $choix; ?><br>
	</div>

	<div class="footer">
	Voir le <a href="<?php echo $matriceModele; ?>" TARGET="_blank">Tableau modèle de matrice</a><br>
	</div>
</div>





