<?php

// Initialisation des variabes du compteur
$joueur1 = wLogRead($dataPathGlobal,'nameJ1');
$countJ1 = wCountRead($dataPathGlobal,'joueur1');

$joueur2 = wLogRead($dataPathGlobal,'nameJ2');
$countJ2 = wCountRead($dataPathGlobal,'joueur2');




//Si on entre un chiffre sans justification
if ($_POST['nbGage']!=null && $_POST['justif']==null){
	$messageAction = '<font color="red">Et la justification alors ??</font>';
}
// si on entre une justification sans chiffre
if ($_POST['nbGage']==null && $_POST['justif']!=null){
	$messageAction = '<font color="#70c3ed">Faudrait voir à rentrer un nombre...</font>';
}

// Si on entre un chiffre et une justification
if ($_POST['nbGage']!=null && $_POST['justif']!=null){
	// ACTIONS pour JOUEUR 1
	if (isset($_POST['addjoueur1'])){
		$newCount = wCountRead($dataPathGlobal,'joueur1')+$_POST['nbGage'];
		wCountErase($dataPathGlobal,'joueur1');
		wCountAdd($dataPathGlobal,'joueur1',$newCount);
		wCountInLogGlobal($dataPathGlobal,'ajoute',$_POST['nbGage'],$joueur1,$_POST['justif']);
		$messageAction = "Ajout effectué";
	}
	if (isset($_POST['remjoueur1'])){		
		$newCount = wCountRead($dataPathGlobal,'joueur1')-$_POST['nbGage'];
		wCountErase($dataPathGlobal,'joueur1');
		wCountAdd($dataPathGlobal,'joueur1',$newCount);
		wCountInLogGlobal($dataPathGlobal,'retire',$_POST['nbGage'],$joueur1,$_POST['justif']);
		$messageAction = "Retrait effectué";
	}

	// ACTIONS pour JOUEUR2
	if (isset($_POST['addjoueur2'])){
		$newCount = wCountRead($dataPathGlobal,'joueur2')+$_POST['nbGage'];
		wCountErase($dataPathGlobal,'joueur2');
		wCountAdd($dataPathGlobal,'joueur2',$newCount);
		wCountInLogGlobal($dataPathGlobal,'ajoute',$_POST['nbGage'],$joueur2,$_POST['justif']);
		$messageAction = "Ajout effectué";
	}
	if (isset($_POST['remjoueur2'])){		
		$newCount = wCountRead($dataPathGlobal,'joueur2')-$_POST['nbGage'];
		wCountErase($dataPathGlobal,'joueur2');
		wCountAdd($dataPathGlobal,'joueur2',$newCount);
		wCountInLogGlobal($dataPathGlobal,'retire',$_POST['nbGage'],$joueur2,$_POST['justif']);
		$messageAction = "Retrait effectué";
	}
}

// Si on change les noms
if (isset($_POST['changeName'])){
		if (isset($_POST['nameJ1']) && $_POST['nameJ1']!="" ){
			wChangeNameInLogGlobal($dataPathGlobal,'change',$joueur1,$_POST['nameJ1']);
			wLogErase($dataPathGlobal,'nameJ1');
			wLog($dataPathGlobal,'nameJ1',$_POST['nameJ1']);
			$joueur1 = $_POST['nameJ1'];

		}
		if (isset($_POST['nameJ2'])&& $_POST['nameJ2']!=""){
			wChangeNameInLogGlobal($dataPathGlobal,'change',$joueur2,$_POST['nameJ2']);
			wLogErase($dataPathGlobal,'nameJ2');
			wLog($dataPathGlobal,'nameJ2',$_POST['nameJ2']);
			$joueur2 = $_POST['nameJ2'];

		}	

		$messageAction = "Changement effectué";
}

//Si on remet à 0 le compteur
if (isset($_POST['erase'])){
	//On inscrit dans les logs l'action
	wCountEraseInLogGlobal($dataPathGlobal,'EFFACE',$countJ1,$countJ2,$joueur1,$joueur2);
	//On supprime les compteurs des joueurs
	wCountErase($dataPathGlobal,'joueur2');
	wCountErase($dataPathGlobal,'joueur1');
	//On réinscrit '0' dans les compteurs
	wCountAdd($dataPathGlobal,'joueur1',0);
	wCountAdd($dataPathGlobal,'joueur2',0);
}

//Si on réinitialise le compteur (noms ET comptes)
if (isset($_POST['initialise'])){
	//On inscrit dans les logs l'action
	wCountEraseInLogGlobal($dataPathGlobal,'REINITIALISE',$countJ1,$countJ2,$joueur1,$joueur2);
	//On supprime les compteurs des joueurs
	wCountErase($dataPathGlobal,'joueur2');
	wCountErase($dataPathGlobal,'joueur1');
	//On supprime les noms des joueurs
	wLogErase($dataPathGlobal,'nameJ1');
	wLogErase($dataPathGlobal,'nameJ2');
	//On réinscrit les noms par défaut 'joueur 1 et Joueur 2'
	wLog($dataPathGlobal,'nameJ2','Joueur 2');
	wLog($dataPathGlobal,'nameJ1','Joueur 1');
	//On réinscrit '0' dans les compteurs
	wCountAdd($dataPathGlobal,'joueur1',0);
	wCountAdd($dataPathGlobal,'joueur2',0);

	// On réinitialise les variables de nom pour l'affichage
	$joueur1 = wLogRead($dataPathGlobal,'nameJ1');
	$joueur2 = wLogRead($dataPathGlobal,'nameJ2');

}



?>
<div class="wrapper" style="overflow-x:auto;">
	<div class="contenu">
	<?php
	// Message de confirmation si on enregistre
	// Si on met à jour un compteur existant
	if(isset($_POST['updateCount'])){

		wCountErase($dataPathGlobal.'/countsave','joueur1-'.$_POST['countNbId']);
		wLogErase($dataPathGlobal.'/countsave','nameJ1-'.$_POST['countNbId']);
		wCountErase($dataPathGlobal.'/countsave','joueur2-'.$_POST['countNbId']);
		wLogErase($dataPathGlobal.'/countsave','nameJ2-'.$_POST['countNbId']);


		//En récupère les noms et les comptes en cours
		$joueur1 = wLogRead($dataPathGlobal,'nameJ1');
		$countJ1 = wCountRead($dataPathGlobal,'joueur1');

		$joueur2 = wLogRead($dataPathGlobal,'nameJ2');
		$countJ2 = wCountRead($dataPathGlobal,'joueur2');


		// On inscrit dans les logs (+création des fichiers)
		wCountAdd($dataPathGlobal.'/countsave','joueur1-'.$_POST['countNbId'],$countJ1);
		wCountAdd($dataPathGlobal.'/countsave','joueur2-'.$_POST['countNbId'],$countJ2);

		wLog($dataPathGlobal.'/countsave','nameJ1-'.$_POST['countNbId'],$joueur1);
		wLog($dataPathGlobal.'/countsave','nameJ2-'.$_POST['countNbId'],$joueur2);

		echo "Compteur <font color='#fff'>".$_POST['countNbId']."</font> mis à jour";
	}
	if(isset($_POST['newsave'])){
		$unigID = uniqid(); // création d'un unique ID (rerpis dans le nom des fichiers)
	?>
		Compteur bien enregistré sous le numéro <b><?php echo $unigID; ?></b><br>
		Pensez bien à le noter, il vous servira à récupérer vos données lors d'une prochaine partie !
	<?php
	//En récupère les noms et les comptes en cours
		$joueur1 = wLogRead($dataPathGlobal,'nameJ1');
		$countJ1 = wCountRead($dataPathGlobal,'joueur1');

		$joueur2 = wLogRead($dataPathGlobal,'nameJ2');
		$countJ2 = wCountRead($dataPathGlobal,'joueur2');


		// On inscrit dans les logs (+création des fichiers)
		wCountAdd($dataPathGlobal.'/countsave','joueur1-'.$unigID,$countJ1);
		wCountAdd($dataPathGlobal.'/countsave','joueur2-'.$unigID,$countJ2);

		wLog($dataPathGlobal.'/countsave','nameJ1-'.$unigID,$joueur1);
		wLog($dataPathGlobal.'/countsave','nameJ2-'.$unigID,$joueur2);
	}
	?>

		<form method="post">
			<input type="submit" name="countNumber" value="Utiliser un compteur sauvegardé" class="lanceur darkButton">
			<input type="submit" name="save" value="Sauvegarder" class="lanceur darkButton"  >
		</form>

	<?php
	// Si on a déjà un code
	if(isset($_POST['countNumber'])) {
	?>
		<form method="post">
			Entrez le numéro de votre compteur <br>
			<input type="text" name="countCode" placeholder="ex : 57a653cfd64c1" size="25">
			<input type="submit" name="useCount" value="ok" class="lanceur darkButton">
		</form>
	<?php
	}

	if(isset($_POST['save'])) {
	?>
		<form method="post">
			Entrez le numéro de votre compteur à mettre à jour <br>
			<input type="text" name="countNbId" placeholder="ex : 57a653cfd64c1" size="25">
			<input type="submit" name="updateCount" value="ok" class="lanceur darkButton" onclick="if(!confirm('Voulez-vous vraiment mettre à jour ce compteur ?')) return false;">
		</form>
		<form method="post">
			Ou faire une nouvelle sauvegarde <input type="submit" name="newsave" value="ok" class="lanceur darkButton" onclick="if(!confirm('Voulez-vous vraiment enregistrer ce compteur ?')) return false;">
		</form>
	<?php
	}


	//Si on utilise un compteur existant
	if(isset($_POST['useCount'])){
		$file=$dataPathGlobal."/countsave/log_nameJ1-".$_POST['countCode'].".log";

		if (file_exists($file)) {
			$readNameJ1=wLogRead($dataPathGlobal.'/countsave','nameJ1-'.$_POST['countCode']);
			$readNameJ2=wLogRead($dataPathGlobal.'/countsave','nameJ2-'.$_POST['countCode']);
			$readCountJ1=wCountRead($dataPathGlobal.'/countsave','joueur1-'.$_POST['countCode']);
			$readCountJ2=wCountRead($dataPathGlobal.'/countsave','joueur2-'.$_POST['countCode']);


			//On supprime les compteurs des joueurs
			wCountErase($dataPathGlobal,'joueur2');
			wCountErase($dataPathGlobal,'joueur1');
			//On supprime les noms des joueurs
			wLogErase($dataPathGlobal,'nameJ1');
			wLogErase($dataPathGlobal,'nameJ2');

			wLog($dataPathGlobal,'nameJ1',$readNameJ1);
			wCountAdd($dataPathGlobal,'joueur1',$readCountJ1);
			wLog($dataPathGlobal,'nameJ2',$readNameJ2);
			wCountAdd($dataPathGlobal,'joueur2',$readCountJ2);

			// On réinitialise les variables de nom pour l'affichage
			$joueur1 = wLogRead($dataPathGlobal,'nameJ1');
			$joueur2 = wLogRead($dataPathGlobal,'nameJ2');

			wUseCountLogGlobal($dataPathGlobal,$joueur1,$joueur2);
		}

		else{
			echo 'Pas de compteur à ce numéro';
		}
	}
	?>	

		<form method="post">
		<table class="tableHide">
			<tr>			
				<td>
				[<?php echo $joueur1; ?>]
				</td>
				<td class="cellCountNumb">
					<?php
					$countJ1 = wCountRead($dataPathGlobal,'joueur1');
					echo $countJ1;
					?>
				</td>
				<td>
					<input type="submit" name="addjoueur1" value="+"  class="darkButton" src="de.gif">
					<input type="submit" name="remjoueur1" value="-"  class="darkButton">
					<input type="text" name="nbGage" placeholder="Nb" size="2"> <input type="text" name="justif" placeholder="Justifiez votre action" size="25">
					<input type="submit" name="addjoueur2" value="+"  class="darkButton">
					<input type="submit" name="remjoueur2" value="-"  class="darkButton">
				</td>
				<td class="cellCountNumb">
					<?php
					$countJ2 = wCountRead($dataPathGlobal,'joueur2');
					echo $countJ2;
					?>
				</td>
				<td>
				[<?php echo $joueur2; ?>]
				</td>		
			</tr>	
		</table>
		
		</form>
	</div>
	<div class="message">
	<?php echo $messageAction; ?>
	</div>


	<div class="contenu">
	<input type="submit" value="Modifier le nom des joueurs" class="show blackButton">

		<p3>
			<form method="post">
			<input type="text" name="nameJ1" placeholder="<?php echo $joueur1; ?>" size="25"> <input type="text" name="nameJ2" placeholder="<?php echo $joueur2; ?>" size="25">
			<input type="submit" name="changeName" value="ok" class="lanceur darkButton">
			</form>
		</p3>
		<form method="post">
			<input type="submit" name="erase" value="Compteurs à 0" class="lanceur darkButton"  onclick="if(!confirm('Voulez-vous vraiment remettre les compteurs à 0 ?')) return false;">
			<input type="submit" name="initialise" value="Réinitialiser" class="lanceur darkButton"  onclick="if(!confirm('Voulez-vous vraiment réinitialiser le compteur (noms ET compteurs) ?')) return false;">
			
		</form>
	</div>
</div>