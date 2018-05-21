<?php include("header.php"); ?>


	<h1>Creer un nouvel événement :</h1>


	<?php if(Session::has('erreurInscription')){
			echo "<p>".Session::get('erreurInscription')."</p>";
			Session::forget('erreurInscription');
		}
	?>

	<form action="" method="post">
		<div class="newEvent">

		<br>
			<input type="text" placeholder="Nom de l'événement*" name="name" maxlength="255"><br>
			<input type="radio" name="genre" value="Public" checked> Public
  			<input type="radio" name="genre" value="Privé"> Privé<br>
			<input type="text" placeholder="Description*" name="desc" maxlength="250"><br>
			<input type="text" placeholder="Lieu*" name="lieu" maxlength="250"><br><br>
			date de début* : <input type="date" name="dateDeb"><br>
			date de fin* : <input type="date" name="dateFin"><br>
			<input type="checkbox" name="suppr" value="suppr"> Supression automatique<br>

			* champs obligatoires<br>
			<?php echo csrf_field(); ?>
			<input type="submit" id="register" value="creer l'evenement"><br>

		</div
	</form>
	
	
<?php include("footer.php");?>