<?php include("header.php"); ?>

<div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center align-items-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Options du compte</h5>
			</div>

			<div class="card-body">

				<form action="" method="post">

					<?php if(Session::has('erreurUpdate')){
						echo "<p>".Session::get('erreurUpdate')."</p>";
						Session::forget('erreurUpdate');
					}?>

					<div class="form-group">

						<label for="pseudo">Nom d'utilisateur:</label>
						<input type="text" placeholder="Pseudo" name="pseudo" class="form-control" value="<?php echo Session::get( 'utilisateur')->pseudo; ?>" required>
					</div>

					<div class="form-group">

						<label for="mail">Email:</label>
						<input type="email" placeholder="Email" name="mail" class="form-control" value=<?php echo Session::get( 'utilisateur')->mail; ?> required></td>
					</div>

					<div class="form-group">

						<label for="mdp">Nouveau mot de passe:</label>
						<input type="password" id="mdp" placeholder="Mot de passe" class="form-control" name="mdp">
						<small class="form-text text-muted">Laissez vide pour ne pas changer</small>
					</div>

					<div class="form-group">

						<label for="cmdp">Confirmation:</label>
						<input type="password" id="cmdp" placeholder="Mot de passe" class="form-control" name="cmdp">
						<small class="form-text text-muted">Laissez vide pour ne pas changer</small>
					</div>

					<label>Recevoir les notifications: </label>

					<div class="form-check form-check-inline">

						<input class="form-check-input" type="radio" name="invitations" id="radioamis" value="amis" <?php if(Session::get(
						 'utilisateur')->recevoirInvitation == "ami")echo "checked"; ?>>
						<label class="form-check-label" for="radioamis">Amis</label>
					</div>

					<div class="form-check form-check-inline">

						<input class="form-check-input" type="radio" name="invitations" id="radiotous" value="tous" <?php if(Session::get(
						 'utilisateur')->recevoirInvitation == "tous")echo "checked"; ?>>
						<label class="form-check-label" for="radiotous">Tous</label>
					</div>

					<div class="form-check form-check-inline">

						<input class="form-check-input" type="radio" name="invitations" id="radionone" value="aucun" <?php if(Session::get(
						 'utilisateur')->recevoirInvitation == "aucun")echo "checked"; ?>>
						<label class="form-check-label" for="radionone">Personne</label>
					</div>

					<br>
					<br>

					<label>Réception d'email pour chaque notification: </label>

					<div class="form-check form-check-inline">

						<input class="form-check-input" type="radio" name="notif" id="notifyes" value="1" <?php if(Session::get( 'utilisateur')->recevoirMail == "1")echo "checked"; ?>>
						<label class="form-check-label" for="notifyes">Oui</label>
					</div>

					<div class="form-check form-check-inline">

						<input class="form-check-input" type="radio" name="notif" id="notifno" value="0" <?php if(Session::get( 'utilisateur')->recevoirMail == "0")echo "checked"; ?>>
						<label class="form-check-label" for="notifno">Non</label>
					</div>

					<!-- HACK: Déplacer le bouton en dessous-->
					<br>
					<input type="submit" id="register" class="btn btn-primary" value="Appliquer">
					<input type="button" class="btn btn-danger" onclick="location.href='supprimerCompte'" value="Supprimer ce compte" />

					<?php echo csrf_field(); ?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>