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
global $viewContent,$erreur,$lastPlayer,$resultat_to_show,$resultat_URL,$count1,$count2,$choix1,$choix2;

## sélection des listes classique OU online
if(TYPE_GAGE == 0){
    include(PATH_ABSOLUT.'/config/gages_classique.php');
}
if(TYPE_GAGE == 1){
    include(PATH_ABSOLUT.'/config/gages_online.php');   
}


$limit = 6;
$dataPath = PATH_VAR.'/doubleplayer';

$lastPlayer = '';
if(TYPE_PLAY == 0){
    if(TYPE_GAGE==0){ // si version classique
        $player1 = 'dice_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'dice_play2';
    }
    if(TYPE_GAGE==1){// si version online
        $player1 = 'online_dice_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'online_dice_play2';
    }
    
    if (isset($_POST['player1'])){
        $lastPlayer = 1;
        $choix1=rand(1,$limit);// Alors fait un random entre 1 et 12
        $choix2=rand(1,$limit); // idem pour le dé n°2

        $score=$choix1+$choix2;
        $resultat_to_show = $score;
        $oldScore = wLogRead($dataPath,$player1);
        if($oldScore < 21){
            $result_to_log = $oldScore+$score;
        }
        if($oldScore > 21){
            $result_to_log = $oldScore-$score;
        }
        
        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$player1);

        //on efface le fichier précédant
        wLogErase($dataPath,$player1);

        //on écrit le nouveau résultat (numéro du gage) 
        wLog($dataPath,$player1,$result_to_log);
        wLogGlobal($dataPath,$player1,$result_to_log);

        unset($oldScore);
    }  
    if(isset($_POST['player2'])){
        $lastPlayer = 2;
        $choix1=rand(1,$limit);// Alors fait un random entre 1 et 12
        $choix2=rand(1,$limit); // idem pour le dé n°2

        $score=$choix1+$choix2;
        $resultat_to_show = $score;
        $oldScore = wLogRead($dataPath,$player2);
        if($oldScore < 21){
            $result_to_log = $oldScore+$score;
        }
        if($oldScore > 21){
            $result_to_log = $oldScore-$score;
        }
        
        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$player2);

        //on efface le fichier précédant
        wLogErase($dataPath,$player2);

        //on écrit le nouveau résultat (numéro du gage) 
        wLog($dataPath,$player2,$result_to_log);
        wLogGlobal($dataPath,$player1,$result_to_log);

        unset($oldScore);
    }
    
}

if(TYPE_PLAY == 1){
     if(TYPE_GAGE==0){ // si version classique
        $player1 = 'gage_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'gage_play2';
    }
    if(TYPE_GAGE==1){// si version online
        $player1 = 'online_gage_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'online_gage_play2';
    }
    
    if (isset($_POST['player1'])){
        $result_to_log=rand(1,sizeof($GLOBALS['liste_player1']));
        $resultat_to_show = $result_to_log;
        $resultat_URL=$GLOBALS['liste_player1'][$resultat_to_show];
        
        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$player1);

        //on efface le fichier précédant
        wLogErase($dataPath,$player1);

        //on écrit le nouveau résultat (numéro du gage) 
        wLog($dataPath,$player1,$result_to_log);
        wLogGlobal($dataPath,$player1,$result_to_log);
    }
    if (isset($_POST['player2'])){
        $result_to_log=rand(1,sizeof($GLOBALS['liste_player2']));
        $resultat_to_show = $result_to_log;
        $resultat_URL=$GLOBALS['liste_player2'][$resultat_to_show];
        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$player2);

        //on efface le fichier précédant
        wLogErase($dataPath,$player2);

        //on écrit le nouveau résultat (numéro du gage) 
        wLog($dataPath,$player2,$result_to_log);
        wLogGlobal($dataPath,$player1,$result_to_log);
    }
    
}




## Si on clique sur EFFACER ##
if(isset($_POST['erase'])){
    if(TYPE_PLAY == 0){
        if(TYPE_GAGE==0){ // si version classique
        $player1 = 'dice_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'dice_play2';
        }
        if(TYPE_GAGE==1){// si version online
            $player1 = 'online_dice_play1';//on initialise player 1 pour choisir le bon fichier log
            $player2 = 'online_dice_play2';
        }
    }
    if(TYPE_PLAY == 1){
        if(TYPE_GAGE==0){ // si version classique
        $player1 = 'gage_play1';//on initialise player 1 pour choisir le bon fichier log
        $player2 = 'gage_play2';
        }
        if(TYPE_GAGE==1){// si version online
            $player1 = 'online_gage_play1';//on initialise player 1 pour choisir le bon fichier log
            $player2 = 'online_gage_play2';
        }
    }
	
	# on vérifie que le fichier existe, sinon il se crée
	wLogRead($dataPath,$player1);
	wLogRead($dataPath,$player2);

	//on efface le fichier précédant
	wLogErase($dataPath,$player1);
	wLogErase($dataPath,$player2);
}

#on récupère le numéro du gage inscrit dans les logs
$count1 = wLogRead($dataPath,$player1);	
$count2 = wLogRead($dataPath,$player2);


## On appel le template view correspondant ##
if(TYPE_PLAY == 0){
    $viewContent = 'doublePlayerView';
}
if(TYPE_PLAY == 1){
    $viewContent = 'doublePlayerView';
}




