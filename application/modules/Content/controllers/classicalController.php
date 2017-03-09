<?php
/*
* @type = CONTROLLER
*
* Traitement de création de page modèle CLASSIQUE
*/

#-> DEFINITION DES VARIABLES GLOBALES <-#
    global $viewContent,$erreur,$limit,$vGage,$resultat,$dataPath;
#-> END <-#


#-> SELECTION DES CHEMINS DE FICHIERS GAGES (CLASSIQUE/ONLINE) <-#
    if(TYPE_GAGE == 0){
        $dataPath = PATH_VAR;
        $gagePageSource = PATH_ABSOLUT.'/config/gages_classique.php';
         
    }
    if(TYPE_GAGE == 1){
        $dataPath = PATH_VAR.'/online';
        $gagePageSource = PATH_ABSOLUT.'/config/gages_online.php';     
    }
#-> END <-#

#-> INCLUSION DE FICHIER SOURCE DE GAGE <-#
    include($gagePageSource);
#-> END <-#

#-> DEFINITION DES VARIABLES UNIQUES <-#
    $vGage=$GLOBALS['liste_'.PAGE_CODE];
    $limit = $GLOBALS['total_gage_'.PAGE_CODE];
    $dataPath = PATH_VAR;
#-> END <-#


#-> TRAITEMENT DUN RESULTAT <-#
    # Assurons-nous qu'au premier chargement de la page, aucun résultat n'apparaisse
    if (isset($_POST['resultNb'])){ #/ Si le bouton "des" est actionné

        $choix=rand(1,$limit); # Alors fait un random entre 1 et 12

        # on vérifie que le fichier existe, sinon il se crée
        wLogRead($dataPath,$GLOBALS['page'.PAGE_CODE]);

        # on efface le fichier précédant
        wLogErase($dataPath,$GLOBALS['page'.PAGE_CODE]);

        # on écrit le nouveau résultat (numéro du gage) 
        wLog($dataPath,$GLOBALS['page'.PAGE_CODE],$choix);
        wLogGlobal($dataPath,$GLOBALS['page'.PAGE_CODE],$choix);

        # on récupère le numéro du gage inscrit dans les logs
        $num = wLogRead($dataPath,$GLOBALS['page'.PAGE_CODE]);

        # Résultat	
        $resultat=$vGage[$num];

    }
#-> END <-#

#-> LECTURE DU DERNIER RESULTAT <-#
    if (isset($_POST['read'])){# Si le bouton "des" est actionné
        # on récupère le numéro du gage inscrit dans les logs
        $num = wLogRead($dataPath,$GLOBALS['page'.PAGE_CODE]);

        # Résultat
        $resultat=$vGage[$num];
    }
#-> END <-#





#-> APPEL DU TEMPLATE VIEW <-#
    $viewContent = 'classicalView';
#-> END <-#






