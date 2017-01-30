<?php
/**
 * @type = PAGE
 *
 * DESCRIPTION :
 * Page d'édition des rapports
 * Elle lance le controller edit.php
 **/


/* Définition des variables globales. */
global $sController,$rootpath;

## Détermine le controller du CONTENT à executer en fonction du type de page (gage classique, doublePlayer, matrice) ##
if(isset($_GET['typepage'])){
    if($_GET['typepage']==1){ // doublePlayer
        $sController = 'doublePlayerController';
        define('TYPE_PLAY', $_GET['typeplay'], true); // (jeu de 21 ou gage double player)
    }
    elseif($_GET['typepage']==2){// matrice  (supplice)
        $sController = 'matriceController';
        define('TYPE_PLAY', $_GET['typeplay'], true);// (jeu de 21 ou gage double player)
    }
    else{       
        $sController = 'classicalController';
    }
}
else{
    $sController = 'classicalController';
}



## on défini la page à router ## (sensuel, hot,..)
if(isset($_GET['codepage'])){
    define('PAGE_CODE', $_GET['codepage'], true);
}
else{
    define('PAGE_CODE', '0', true);// sinon par défaut -> index. 
}



## on défini le type de gage ## (classique, online)
if(isset($_GET['typegage'])){
    define('TYPE_GAGE', $_GET['typegage'], true);
}
else{
    define('TYPE_GAGE', '0', true);// sinon par défaut -> classique
}



/* Exécution du bootstrap. */
include('../application/bootstrap.php');
/* Initialisation des différents services. */


    