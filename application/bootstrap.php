<?php
define('ROOTPATH', 'http://localhost/apigit/jgc/application', true);
/* Définition des constantes systèmes. */
define( 'PATH_ABSOLUT',		'../application/');
define( 'PATH_CONF',			'config');
define( 'PATH_LIB', 			'library');
define( 'PATH_VAR',				PATH_ABSOLUT.'/data');

/* Inclusion des librairies. */
include(PATH_LIB.'/module.php'); 
include(PATH_LIB.'/translations/translation_fr.php');
include(PATH_CONF.'/config.php');
include(PATH_CONF.'/fonctions.php');
?>
<!-- Inclusion des styles CSS -->
<style type="text/css">
    <?php include(PATH_CONF.'/style.css'); ?>
</style>

<!-- Inclusion des scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script type="text/javascript">
    <?php include(PATH_CONF.'/script.js'); ?>
</script>



<?php 
/** Exécution des traitements. 
On execute le module LAYOUT, qui par défaut exécutera INDEX.PHP et affichera INDXE.PHTML
Comme le précise la page LIBRARY MODULE.PHP 
Pour Exécuter un autre template, il suffira de mettre module_execute( 'layout', 'NomTemplate')
A condition d'avoir créé au préalable un NomTemplate :p */
module_execute( 'Layout');

/* Transmission du contenu généré. */
echo module_render( 'Layout');