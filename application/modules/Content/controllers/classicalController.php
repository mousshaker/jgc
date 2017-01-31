<?php
/*
* @type = CONTROLLER
*
Ceci est un modèle de page publique
*/

/* Définition des variables globales. */
global $viewContent,$erreur,$limit,$vGage,$resultat;


//Inclusions spécifiques à la page





## sélection des listes classique OU online
if(TYPE_GAGE == 0){
    include(PATH_ABSOLUT.'/config/gages_classique.php');    
}
if(TYPE_GAGE == 1){
    include(PATH_ABSOLUT.'/config/gages_online.php');   
}

$vGage=$GLOBALS['liste_'.PAGE_CODE];
$limit = $GLOBALS['total_gage_'.PAGE_CODE];

$dataPath = PATH_VAR;

// Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
if (isset($_POST['resultNb'])){// Si le bouton "des" est actionné
	
	$choix=rand(1,$limit);// Alors fait un random entre 1 et 12
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,$GLOBALS['page'.PAGE_CODE]);

	//on efface le fichier précédant
	wLogErase($dataPath,$GLOBALS['page'.PAGE_CODE]);

	//on écrit le nouveau résultat (numéro du gage) 
	wLog($dataPath,$GLOBALS['page'.PAGE_CODE],$choix);
	wLogGlobal($dataPath,$GLOBALS['page'.PAGE_CODE],$choix);
	
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$GLOBALS['page'.PAGE_CODE]);

	//$resultat="gage".$num;// le résultat sera gageN°choisi		
	$resultat=$vGage[$num];
	
}

if (isset($_POST['read'])){// Si le bouton "des" est actionné
	//on récupère le numéro du gage inscrit dans les logs
	$num = wLogRead($dataPath,$GLOBALS['page'.PAGE]);

	//$resultat="gage".$num;// le résultat sera gageN°choisi
	$resultat=$vGage[$num];

	//$result=$$resultat;
}






/* Affiche la view Accueil */
$viewContent = 'classicalView';








