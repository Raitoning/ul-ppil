<?php include("header.php"); ?>
	<div class="d-flex justify-content-center align-items-center container">
		<div class="col-10">
			<div class="card mb-3">
				<div class="card-header">
					<h1>Bienvenue sur TODO List</h1>
				</div>
				
				<div class="card-body">
					<div id="login">
						<?php 
							if(Session::has('erreurConnexion')) {
								echo "<div class='alert alert-danger' role='alert'>
									  ".Session::get('erreurConnexion')."
									</div>";
							}
						?>
						<form action="" method="post">
							<div class="form-group">
								<label for="user">Pseudo: </label><br>
								<input type="text" class="form-control" placeholder="Pseudo" name="user">
							</div>
							<div class="form-group">	
								<label for="mdp">Mot de passe: </label><br>
								<input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
								<small class="form-text text-muted"> <a href="lostpw"> Mot de passe oublié ? </a></small><br>
							</div>

							<input type="submit" id="connexion" class="btn btn-primary" value="Connexion"><br>
							
							<?php echo csrf_field(); ?>

						</form>
							<input type="button" class="btn btn-success" onclick="location.href='inscription';" value="Inscription" />
							<input type="submit" class="btn btn-primary" onclick="location.href='publicsEvents';" id="anon" value="Accès Anonyme">
						
					</div>					
				</div>

				
			</div>
		</div>
	</div>
	
	
<?php include("footer.php");
	  Session::forget('erreurConnexion');
?>