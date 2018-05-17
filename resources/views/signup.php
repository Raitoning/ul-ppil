<?php include("header.php"); ?>

	<h1>Inscription</h1>

	<div id="content">
		<form action="inscription" method="post">

			<?php if(Session::has('erreurInscription')){
					echo "<p>".Session::get('erreurInscription')."</p>";
					Session::forget('erreurInscription');
				}
			?>

			<table>
				<tr><td><label for="pseudo">Nom d'utilisateur:</label></td><td><input type="text" placeholder="Pseudo" name="pseudo" required></td></tr>
				<tr><td><label for="mail">Email:</label></td><td><input type="text" placeholder="Email" name="mail" required></td></tr>
				<tr><td><label for="mdp">Mot de passe:</label></td><td><input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required></td></tr>
				<tr><td><label for="cmdp">Confirmer mot de passe:</label></td><td><input type="password" id="cmdp" placeholder="Mot de passe" name="cmdp" required></td></tr>
			</table>

			<input type="checkbox" id="checkconditions" name="conditions" value="vconditions">
			<label for="conditions">J'accepte les <a href="#">Termes et conditions générales d'utilisation</a>.</label></br>
			<?php echo csrf_field(); ?>
			<input type="submit" id="register" value="Inscription"><a href="#"> En savoir plus ?</a>
		</form>
	</div>

<?php include("footer.php");?>