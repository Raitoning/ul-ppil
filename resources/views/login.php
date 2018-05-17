
<?php include("header.php"); ?>
	<form action="" method="post">
		<div class="login" style="background-color:lightblue">
		<?php if(Session::has('erreurConnexion'))
				echo "<p>".Session::get('erreurConnexion')."</p>"
		?>
		<br>
			<input type="text" placeholder="Email" name="user"><br>
			<input type="password" placeholder="Mot de passe" name="mdp"><br>
			<input type="submit" id="connexion" value="Connexion"><br>
			<?php echo csrf_field(); ?>

		</div
	</form>
				<a href="lostpw"> Mot de passe oubli&eacute; ? </a><br>
	<form>
		<div class="signup">
			<input type="submit" id="signup" value="Inscritpion">
		</div>
	</form>
	<form>
		<div class="anon">
			<input type="submit" id="anon" value="Acc&egrave;s Anonyme">
		</div>
	</form>
	
	
<?php include("footer.php");
	  Session::forget('erreurConnexion');
?>