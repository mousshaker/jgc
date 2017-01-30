<?php
/*
* @type = CONTROLLER
*
* DESCRIPTION :
* Permet de déterminer quelle page de sélection afficher, en fonction du profile :
* RAPPORTEUR 	= > ecran2
* ADMIN 		= > ecran2B
*/

/* Définition des variables globales. */
global $viewContent,$erreur,$lastPlayer,$choix,$nbLettre,$nbChiffre;

//Inclusions spécifiques à la page
include(PATH_ABSOLUT.'/config/gages_classique.php');


$path = PATH_VAR.'/doubleplayer';

$nbLettre=5;
$nbChiffre=10;
//$randLetter = rand(0,count($GLOBALS['alphabet'])-1);
$randLetter = rand(0,$nbLettre-1);
$randNum=rand(1,$nbChiffre);//choix du chiffre

if (isset($_POST['chooseCombo']) OR isset($_POST['chooseLetter']) OR isset($_POST['chooseNum'])){
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($path,$GLOBALS['page'.PAGE_CODE]);

	//on efface le fichier mémo précédant
	wLogErase($path,$GLOBALS['page'.PAGE_CODE]);

	if (isset($_POST['chooseCombo'])){// Si le bouton "chooseCombo" est actionné
		// on effectue un Random pour la lettre
		$lettre = $GLOBALS['alphabet'][$randLetter]; // $GLOBALS['alphabet'] et $randLetter sont setées dans config_specifique
		$chiffe = $randNum; // randNum est setée dans config_specifique
		//on compose le choix du choix aléatoire Numérique et du choix de la Lettre
		$choix = $lettre.'-'.$chiffe; // $chiffe est setée dans config_specifique
	}

	if (isset($_POST['chooseLetter'])){// Si le bouton "chooseLetter" est actionné	
		// on effectue un Random pour la lettre
		$lettre = $GLOBALS['alphabet'][$randLetter]; // $GLOBALS['alphabet'] et $randLetter sont setées dans config_specifique

		//on set la variable de résultat à afficher
		$choix = $lettre;	
	}

	if (isset($_POST['chooseNum'])){// Si le bouton "chooseLetter" est actionné
		$chiffe = $randNum;
		//on set la variable de résultat à afficher
		$choix = $chiffe;
	}

	//on écrit le nouveau résultat
	wLog($path,$GLOBALS['page'.PAGE_CODE],$choix); //dans le fichier mémo
	wLogGlobal($path,$GLOBALS['page'.PAGE_CODE],$choix); // dans les logs globaux
}



if (isset($_POST['read'])){// Si le bouton "read" est actionné
	//on récupère dernier résultat inscrit dans le fichbier mémo pour l'afficher
	$num = wLogRead($path,$GLOBALS['page'.PAGE_CODE]);

	$choix=$num;
}

## On appel le template view correspondant ##
if(TYPE_PLAY == 0){
    $viewContent = 'matriceView';
}
if(TYPE_PLAY == 1){
    $viewContent = 'matriceView';
}




