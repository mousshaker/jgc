<?php

/* Définition des variables globales. */
global $title, $sController, $messages;

/**
 Exécution des modules enfants.
* Tous les modules exécutent le controller par défaut
* SAUF "Content", qui est défini dans chaque page.php
* Le Controller par défaut est défini dans library/module.php (c'est indexC.php)
**/

//module_execute( 'Auth');
module_execute( 'Content', $sController);
module_execute( 'Footer');
module_execute( 'Menu');



/**
Réalisation des assignations.
**/

//Le titre est à défnir dans config/message.json
$title = $messages['site_title'];