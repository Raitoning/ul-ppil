
<?php include("header.php"); ?>
	<form action="" method="post">
		<div class="login" style="background-color:lightblue">
		<?php if(Session::has('erreurConnexion')){
				echo "<p>".Session::get('erreurConnexion')."</p>";
				Session::forget('erreurConnexion');
		}
		?>
		<br>
			<input type="text" placeholder="Email" name="user"><br>
			<input type="password" placeholder="Mot de passe" name="mdp"><br>
			<input type="submit" id="connexion" value="Connexion"><br>
			<?php echo csrf_field(); ?>

		</div
	</form>
	<a href="lostpw"> Mot de passe oubli&eacute; ? </a><br>
	<input type="button" onclick="location.href='inscription';" value="Inscription" />
	<form>
		<div class="anon">
			<input type="submit" id="anon" value="Acc&egrave;s Anonyme">
		</div>
	</form>
	
	
<?php include("footer.php");?>