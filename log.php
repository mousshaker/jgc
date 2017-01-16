<?php

include('header.php');

// Titre de la page
pageTitle($siteTitleShort,$log);


# On check si le mot de passe est saisi
if(isset($_POST['password'])){
	#si oui, $password prend la valeur saisie
	$password = $_POST['password'];
}
else{
	#sinon par defaut $ password est vide
	$password = "";	
}

# Clef du mot de passe
$keyPassword = "passjgc";

?>
<!-- SCRIPTS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script>

  $(document).ready(function(){

  	
  	$("p2").hide();
  	

  	$("input.show").click(function(){
    	$("p2").toggle();
  	});

  });
 </script>



<!-- LOGS -->
<div class="wrapper" style="overflow-x:auto;">
	<?php
	#Check si mot de passe saisi est correcte. Si = à $keyPassword, on affiche els logs
	if($password ==$keyPassword){
		?>
		<div class="contenu">	

			<input type="submit" value="Vider les logs" class="show blackButton">
			<!-- <input type="submit" value="Voir les archives" class="show blackButton"> -->

			<p2>
				<div class="fontsmall">
				<br>
				ATTENTION ! N'effacez les logs que lorsque qu'il y en a trop pour que ce soit lisible.<br>
				Notez bien que l'effacement est logué et votre IP enregistrée.
				</div>
				<form method="post">
				<label>Nb de lignes à supprimer</label><input type="text" name="nbLigne" size="2">
				<input type="submit" name="erase" value="ok" class="lanceur darkButton">
				</form>
				<a href="loga.php" class="fontsmall">[Voir les archives]</a>
			</p2>
		</div>

		<div class="logBg">
			<div class="log">
			<?php
			if(isset($_POST['erase'])){
				$nbToErase=$_POST['nbLigne'];
				wLogEraseLine($dataPathGlobal,'global',$nbToErase);
			}

			wLogGlobalReadNew($dataPathGlobal,'global');

			?>
			</div>
		</div>
	<?php
	}
	else{ ?>
		<div class="contenu blocText">
		<?php
			# si password est saisi et != de $keyPassword, on affiche erreur
			if(isset($_POST['password']) && $password !=$keyPassword) {
				echo 'Mauvais MDP !';
			}
			# si password n'est pas saisi ou != de $keyPassword on affiche le formulaire de password
			?>
			<form method="post">
				<label>Mot de passe</label><input type="text" name="password" size="10">
				<input type="submit" name="passwordCheck" value="ok" class="lanceur darkButton">
			</form>
		</div>
	<?php
	}
	?>
	
</div>