<!-- Développé par Mousshaker : mousshk@gmail.com -->

<head>
	<?php
	//inclusion des pages de config globales
	include('conf/config_specific.php');
	include($config);
	include($fonction);
	include($script);
	?>

	<!-- Balise magique pour le responsive -->
	<meta name="viewport" content="width=device-width, maximum-scale=1"/>
	<!-- Inclusion de l'icone d'onglet -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>" />

	<style type="text/css">
	    <?php include($css); ?>
	</style>

</head>

<div class="wrapper" style="overflow-x:auto;">	
	<header>
	    <a class="to_nav" href="#primary_nav">Listes</a>
	</header>
</div>
<?php
/* Inclusion des menus */
include($menu);
include($sous_menu);
?>

