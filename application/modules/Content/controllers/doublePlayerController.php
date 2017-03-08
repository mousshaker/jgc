<?php
/*
* @type = CONTROLLER
*
* DESCRIPTION :
* Gère les pages de type "DoublePlayer" 
* -> les gages avec 2 listes + 1 dé pour chaque joueur
* jeu de 21, illustré... (déterminé grâce au PAGE_CODE)
*/

#-> DEFINITION DES VARIABLES GLOBALES <-#
    global $viewContent,$erreur,$lastPlayer,$resultat_to_show,$resultat_URL,$count1,$count2,$choix1,$choix2,$limite_list;
#-> END <-#

#-> SELECTION DES LISTES DE GAGES (CLASSIQUE/ONLINE) <-#
    if(TYPE_GAGE == 0){
        include(PATH_ABSOLUT.'/config/gages_classique.php');
         $dataPath = PATH_VAR;
    }
    if(TYPE_GAGE == 1){
        include(PATH_ABSOLUT.'/config/gages_online.php');
         $dataPath = PATH_VAR.'/online';
    }
#-> END <-#

#-> DEFINITION  DES VARIABLES UNIQUES <-#
    $limit = 6;
    $lastPlayer = '';
    $dataPathGlobal = PATH_VAR;
#-> END <-#


#-> TRAITEMENT JEU DU 21 <-#
    if(TYPE_PLAY == 0){ # -> Jeu du 21
        if(TYPE_GAGE==0){ # si version classique
            $player1 = 'doublePlayer_dice_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_dice_play2';
        }
        if(TYPE_GAGE==1){# si version online
            $player1 = 'doublePlayer_online_dice_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_online_dice_play2';
        }

        if (isset($_POST['player1'])){
            $lastPlayer = 1; # on indique qui est le dernier joueur
            $choix1=rand(1,$limit);# Alors fait un random entre 1 et la limite
            $choix2=rand(1,$limit); # idem pour le dé n°2

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

            # on efface le fichier précédant
            wLogErase($dataPath,$player1);

            # on écrit le nouveau résultat (numéro du gage) 
            wLog($dataPath,$player1,$result_to_log);
            wLogGlobal($dataPathGlobal,$player1,$result_to_log);

            unset($oldScore);
        }  
        if(isset($_POST['player2'])){
            $lastPlayer = 2; # on indique qui est le dernier joueur
            $choix1=rand(1,$limit);# Alors fait un random entre 1 et la limite
            $choix2=rand(1,$limit); # idem pour le dé n°2

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

            #on efface le fichier précédant
            wLogErase($dataPath,$player2);

            #on écrit le nouveau résultat (numéro du gage) 
            wLog($dataPath,$player2,$result_to_log);
            wLogGlobal($dataPathGlobal,$player2,$result_to_log);

            unset($oldScore);
        }

    }
#-> END <-#

#-> TRAITEMENTS GAGES HOMME / FEMME<-#
    if(TYPE_PLAY == 1){ # -> Liste de gages Homme / Femme
         if(TYPE_GAGE==0){ # si version classique
            $player1 = 'doublePlayer_gage_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_gage_play2';
            //$limite_list = $GLOBALS['total_gage'];
        }
        if(TYPE_GAGE==1){#  si version online
            $player1 = 'doublePlayer_online_gage_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_online_gage_play2';
            //$limite_list = 20;
        }

        if (isset($_POST['player1'])){
            $lastPlayer = 1; # on indique qui est le dernier joueur
            $result_to_log=rand(1,sizeof($GLOBALS['liste_player1']));
            $resultat_to_show = $result_to_log;
            $resultat_URL=$GLOBALS['liste_player1'][$resultat_to_show];

            # on vérifie que le fichier existe, sinon il se crée
            wLogRead($dataPath,$player1);

            # on efface le fichier précédant
            wLogErase($dataPath,$player1);

            # on écrit le nouveau résultat (numéro du gage) 
            wLog($dataPath,$player1,$result_to_log);
            wLogGlobal($dataPathGlobal,$player1,$result_to_log);
        }
        if (isset($_POST['player2'])){
            $lastPlayer = 2; # on indique qui est le dernier joueur
            $result_to_log=rand(1,sizeof($GLOBALS['liste_player2']));
            $resultat_to_show = $result_to_log;
            $resultat_URL=$GLOBALS['liste_player2'][$resultat_to_show];
            # on vérifie que le fichier existe, sinon il se crée
            wLogRead($dataPath,$player2);

            # on efface le fichier précédant
            wLogErase($dataPath,$player2);

            # on écrit le nouveau résultat (numéro du gage) 
            wLog($dataPath,$player2,$result_to_log);
            wLogGlobal($dataPathGlobal,$player2,$result_to_log);
        }

    }
#-> END <-#



#-> EFFACEMENT <-#
    if(isset($_POST['erase'])){ # Si on clique sur EFFACER
        if(TYPE_PLAY == 0){
            if(TYPE_GAGE==0){ # si version classique
            $player1 = 'doublePlayer_dice_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_dice_play2';
            }
            if(TYPE_GAGE==1){# si version online
                $player1 = 'doublePlayer_online_dice_play1';# on initialise player 1 pour choisir le bon fichier log
                $player2 = 'doublePlayer_online_dice_play2';
            }
        }
        if(TYPE_PLAY == 1){
            if(TYPE_GAGE==0){ # si version classique
            $player1 = 'doublePlayer_gage_play1';# on initialise player 1 pour choisir le bon fichier log
            $player2 = 'doublePlayer_gage_play2';
            }
            if(TYPE_GAGE==1){# si version online
                $player1 = 'doublePlayer_online_gage_play1';# on initialise player 1 pour choisir le bon fichier log
                $player2 = 'doublePlayer_online_gage_play2';
            }
        }

        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$player1);
        wLogRead($dataPath,$player2);

        # on efface le fichier précédant
        wLogErase($dataPath,$player1);
        wLogErase($dataPath,$player2);
    }
#-> END <-#


#-> RECUPERATION DU N° DE GAGE INSCRIT DANS LES LOGS <-#
    # Permet d'afficher le compteur des joueurs en front
    $count1 = wLogRead($dataPath,$player1);	
    $count2 = wLogRead($dataPath,$player2);
#-> END <-#

#-> APPEL DU TEMPLATE VIEW <-#
    if(TYPE_PLAY == 0){
        $viewContent = 'doublePlayerView';
    }
    if(TYPE_PLAY == 1){
        $viewContent = 'doublePlayerView';
    }
#-> END <-#



