<?php

/* Définition des variables globales. */
global $viewContent, $title, $messages, $bIsAuthenticated, $ProfilSession, $UsernameSession,$rootpath;



//connexionbdd();
//$bIsAuthenticated = FALSE;


/* Si l'utilisateur est déjà authentifié, on exécute le Controller ECRAN2 */
if ($bIsAuthenticated) { 
	module_execute( 'Content','accueil');
}

/* Sinon (c'est que c'est un profil Rapporteur)*/
else{
	$viewContent = 'indexView';
}