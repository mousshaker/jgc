<!-- Développé par Mousshaker : mousshk@gmail.com -->

<div class="wrapper" style="overflow-x:auto;">
	<?php
	//inclusion des pages de config globales
	include('conf/config_specific.php');
	include($config);
	include($fonction);
	include($script);
	?>

	<!-- Inclusion de l'icone d'onglet -->
	<meta name="viewport" content="width=device-width, maximum-scale=1"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>" />

	<style type="text/css">
	    <?php include($css); ?>
	</style>
	<header>
	    <a class="to_nav" href="#primary_nav">Versions</a>
	</header>
</div>
<?php
/* Inclusion des menus */
include($menu);
include($sous_menu);
?>

