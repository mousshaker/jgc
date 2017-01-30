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

/* Détermine le controller du CONTENT à executer */
$sController = 'indexController';



# Défini la variable glabale PAGE
define('PAGE_CODE', '0', true);

## on défini le type de la page ##
if(isset($_GET['typeplay'])){
    define('TYPE_GAGE', $_GET['typeplay'], true);
}
else{
    define('TYPE_GAGE', '0', true); 
}
        



/* Exécution du bootstrap. */
//require dirname( __DIR__).'/application/bootstrap.php';
include('../application/bootstrap.php');

/* Initialisation des différents services. */

