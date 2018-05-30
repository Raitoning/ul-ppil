<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/login'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Inscription</h5>
			</div>

			<div class="card-body">

				<form action="inscription" method="post">

					<?php if(Session::has('erreurInscription')){
						echo "<div class='alert alert-danger' role='alert'>
							".Session::get('erreurInscription')."</div>";
							Session::forget('erreurInscription');
						}
						?>

					<div class="form-group">

						<label for="pseudo">Nom d'utilisateur:</label>
						<input type="text" placeholder="Pseudo" class="form-control" name="pseudo" minlength="3" required>
						<small class="form-text text-muted">Sera utilisé pour vous connecter</small>
					</div>

					<div class="form-group">

						<label for="mail">Email:</label>
						<input type="mail" placeholder="Email" class="form-control" name="mail" required>
					</div>

					<div class="form-group">

						<label for="mdp">Mot de passe:</label>
						<input type="password" id="mdp" class="form-control" placeholder="Mot de passe" name="mdp" minlength="3" required>
					</div>

					<div class="form-group">

						<label for="cmdp">Confirmer mot de passe:</label>
						<input type="password" id="cmdp" class="form-control" placeholder="Mot de passe" name="cmdp" required>

					</div>

					<input type="submit" id="register" class="btn btn-primary" value="Inscription">

					<?php echo csrf_field(); ?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>