<?php include("header.php"); ?>

<div class="content justify-content-center align-items-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">
				<h5>Bienvenue sur TODO List</h5>
			</div>

			<div class="card-body">

				<h5 class="card-title">Connexion</h5>

				<form action="" method="post">

					<div class="form-group">

						<label for="user">Pseudo: </label>
						<input type="text" class="form-control" placeholder="Pseudo" name="user">
					</div>

					<div class="form-group">

						<label for="mdp">Mot de passe: </label>
						<input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
						<small class="form-text text-muted">
							<a href="lostpw"> Mot de passe oublié ? </a>
						</small>
					</div>

					<input type="submit" id="connexion" class="btn btn-primary" value="Connexion">

					<?php echo csrf_field(); ?>
				</form>

				<br>
				<div class="row">

					<div class="col-md-auto">

						<input type="button" class="btn btn-success mt-1" onclick="location.href='inscription';" value="Inscription" />

					</div>

					<div class="col-md-auto">

						<input type="submit" class="btn btn-primary mt-1" onclick="location.href='publicsEvents';" id="anon" value="Accès Anonyme">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php");
Session::forget('erreurConnexion');
?>