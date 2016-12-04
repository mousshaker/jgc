<?php

include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$page1);

?>
<h1>Compteurs</h1>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
		Voici un petit module de compteurs pour deux joueurs.<br>
		Vous pouvez y ajouter/retirer le nombre de gages que vous souhaitez en fonction de ce que vous avez obtenu comme sanction.<br>
		Le compteur s'incrémente ou se décrémente en fonction de l'opération.
		<br><br>
		ATTENTION : pensez bien à justifier votre action, sinon votre valeur ne sera pas prise en compte.

		<br><br>
		Bon jeu !

	</div>
</div>

<?php
//Inclusion du module de compteur
include($module_counter);

//Inclusion footer
include($footer);