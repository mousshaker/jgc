
<?php
include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$siteTitle);

//Inclusions spécifiques à la page
include($gage_page);


?>
<h1><?php echo $siteTitle; ?></h1>
<div class="wrapper" style="overflow-x:auto;">
	<div class="blocText">
		Voici un petit module de choix aléatoire de gages coquins, parmi des listes prédéfinies.<br>
		Suivant le niveau d'intensité (la version) que vous souhaitez jouer (<?php echo $page1.', '.$page2.', '.$page3.', '.$page6; ?>), cliquez dans le menu en haut.<br>
		En fonction de la version, les gages seront plus ou moins osés, allant du sensuel soft à l'osé très franc.


		<br>
		<br>
		Si vous avez accès au <i><a href="<?php echo $tabloSupplice; ?>" TARGET="_blank">Tableau des supplices</a></i>, vous pouvez alors utiliser le module spécifique prévu à cet effet.<br>
		-> + d'info sur le module <a href="page4.php" class='<?php echo $page4; ?>'> <?php echo $page4; ?></a>

		<br>
		<br>
		Si vous disposez déjà d'un tableau de matrice personnel de gages ou que vous avez envie d'en créer un à vous (pour être libre dans le nombre et dans le type de gages), vous pouvez alors utiliser le module spécifique prévu à cet effet.<br>
		Il vous permet d'obtenir une combinaison aléatoire d'un chiffre et d'une lettre.<br>
		-> + d'info sur le module <a href="page5.php" class='<?php echo $page5; ?>'> <?php echo $page5; ?></a>

		<br>
		<br>
		Enfin Si vous êtes loin de votre partenaire, vous pouvez utiliser la <a href="online/index.php"><?php echo $online; ?> </a> avec des gages spéciaux "longue distance".<br>

		<br>
		<br>

		Des questions ? Des remarques ? Vous souhaitez compléter/modifier/ajouter un niveau de gage ?<br>
		N'hésitez pas à contacter le développeur (lien direct en bas de page)
	</div>

	<?php
	include($footer);
	?>
</div>