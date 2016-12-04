<?php

include('../header.php');

// Titre de la page
pageTitle($siteTitleShort,$siteTitle.' ('.$online.')');

?>

<div class="MenuOnline">
<?php echo $online; ?> <br>
</div>


<h1><?php echo $siteTitle; ?></h1>
<h2>[<?php echo $online; ?>]</h2>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
		Voici un petit module de choix aléatoire de gages, parmi une liste prédéfinie spécialement adaptée au jeu à distance.<br>
		Suivant le même principe que la "version classique", en fonction du niveau d'intensité que vous souhaitez jouer (<?php echo $page1.', '.$page2.', '.$page3; ?>), cliquez dans le menu en haut.<br>
		Suivant le niveau sélectionné, les gages seront plus ou moins osés, allant du sensuel soft à l'osé très franc.
		<br>
		Bon jeu.

		<br>
		<br>
		Retour à la <a href="../index.php"><?php echo 'version classique'; ?> </a>

		<br>
		<br>

		Des questions ? Des remarques ? Vous souhaitez compléter/modifier/ajouter un niveau de gage ?<br>
		N'hésitez pas à contacter le développeur (lien direct en bas de page)
	</div>
</div>
<?php
include($footer);