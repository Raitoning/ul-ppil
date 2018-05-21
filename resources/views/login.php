<?php include("header.php"); ?>
	<div class="d-flex justify-content-center align-items-center container">
		<div class="col-12">
			<div class="row">
				<h1>Bienvenue sur TODO List</h1>
			</div>
			
			<div class="row">
				<div id="login">
					<?php 
						if(Session::has('erreurConnexion')) {
							echo "<p>".Session::get('erreurConnexion')."</p>";
						}
					?>
					<form action="" method="post">
						<div class="form-group">
							<label for="user">Pseudo: </label><br>
							<input type="text" placeholder="Pseudo" name="user">
						</div>
						<div class="form-group">	
							<label for="mdp">Mot de passe: </label><br>
							<input type="password" placeholder="Mot de passe" name="mdp">
							<small class="form-text text-muted"> <a href="lostpw"> Mot de passe oublié ? </a></small><br>
						</div>

						<input type="submit" id="connexion" class="btn btn-primary" value="Connexion"><br>
						
						<?php echo csrf_field(); ?>

					</form>
				</div>
			</div>

			<div class="row">			
				<div id="signup" style="padding-right: 10px">
					<input type="button" class="btn btn-primary" onclick="location.href='inscription';" value="Inscription" />
				</div>

				<div id="anon">
					<input type="submit" class="btn btn-primary" id="anon" value="Accès Anonyme">
				</div>
			</div>
		</div>
	</div>
	
	
<?php include("footer.php");
	  Session::forget('erreurConnexion');
?>