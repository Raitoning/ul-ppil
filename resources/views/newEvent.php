<?php include 'header.php'; ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">
				<h5>Nouvel événement</h5>
			</div>

			<?php if(Session::has('erreurInscription')){
					echo "<div class='alert alert-danger' role='alert'>"
						.Session::get('erreurInscription').
						"</div>";
						Session::forget('erreurInscription');
					}
					?>

			<div class="card-body">

				<form action="" method="post">

					<div class="form-group">

						<label>Nom de l'événement:</label>
						<input type="text" class="form-control" placeholder="Nom de l'évènement*" name="name" maxlength="255">
					</div>

					<div class="form-group">

						<label>date de début*: </label>
						<input type="date" class="form-control" name="dateDeb">
					</div>

					<div class="form-group">

						<label>date de fin*: </label>
						<input type="date" class="form-control" name="dateFin">
					</div>

					<label>Type</label>

					<div class="form-check">

						<input class="form-check-input" type="radio" name="genre" id="prive" value="prive" checked>
						<label class="form-check-label" for="prive">
							Privé
						</label>
					</div>

					<div class="form-check">

						<input class="form-check-input" type="radio" name="genre" id="public" value="public" checked>
						<label class="form-check-label" for="public">
							Public
						</label>
					</div>

					<div class="form-group">

						<label>Description:</label>
						<input type="text" class="form-control" placeholder="Description*" name="desc" maxlength="250">
					</div>

					<div class="form-group">

						<label>Lieu: </label>
						<input type="text" class="form-control" placeholder="Lieu*" name="lieu" maxlength="250">
					</div>

					<div class="form-check">

						<input class="form-check-input" type="checkbox" name="suppr" value="suppr">
						<label class="form-check-label">Suppression automatique</label>
					</div>

					<br>

					<p>* Champs obligatoires</p>

					<?php echo csrf_field(); ?>

					<button type="submit" id="register" class="btn btn-success" value="crer l'evenement">Créer l'événement</button </form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>