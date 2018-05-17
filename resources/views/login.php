<?php include("header.php"); ?>

	<h1>Bienvenue sur TODO List</h1>
	
	<div id="login">
		<?php 
			if(Session::has('erreurConnexion')) {
				echo "<p>".Session::get('erreurConnexion')."</p>";
			}
		?>
		<form action="" method="post">
			<table>
				<tr><td><label for="user">Email: </label></td><td><input type="text" placeholder="Email" name="user"></td></tr>
				<tr><td><label for="mdp">Mot de passe: </label></td><td><input type="password" placeholder="Mot de passe" name="mdp"></td></tr>
			</table>
			<input type="submit" id="connexion" value="Connexion"><br>
			<a href="lostpw"> Mot de passe oubli&eacute; ? </a><br>
			<?php echo csrf_field(); ?>

		</form>
	</div>
				
		<div id="signup">
			<input type="button" onclick="location.href='inscription';" value="Inscription" />
		</div>

	<div id="anon">
		<input type="submit" id="anon" value="Accés Anonyme">
	</div>
	
	
<?php include("footer.php");
	  Session::forget('erreurConnexion');
?>