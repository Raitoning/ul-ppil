<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

<div class="d-flex justify-content-center align-items-center container">
	<div class="col-10">
		<div class="card mb-3">
			<div class="card-header">
				<h1>Créer un nouvel événement :</h1>
			</div>

			<?php if(Session::has('erreurInscription')){
					echo "<div class='alert alert-danger' role='alert'>"
							.Session::get('erreurInscription').
						"</div>";
					Session::forget('erreurInscription');
				}
			?>

			<div class="card-body" style="display : flex; justify-content: space-around;">
				<div class="col-4">
					<form action="" method="post">
						<div class="newEvent"><br>
							<div class="form-group">
								<label>Nom de l'événement *:</label><br>
								<input type="text" class="form-control" placeholder="Nom de l'événement" name="name" maxlength="255" required><br>
							</div>
							<div class="form-group">
								<label>date de début: </label><br>
								<input type="date" class="form-control" name="dateDeb"><br>
								<label>date de fin: </label><br>
								<input type="date" class="form-control" name="dateFin"><br>
							</div>
							<div class="form-group">
								<label>Type : </label>
								<input type="radio" name="genre" value="Public" checked> Public
				  				<input type="radio" name="genre" value="Privé"> Privé<br>
							</div>
							<div class="form-group">
								<label>Déscription *:</label><br>
								<input type="text" class="form-control" placeholder="Déscription" name="desc" maxlength="250" required><br>
							</div>
							<div class="form-group">
								<label>Lieu *: </label><br>
								<input type="text" class="form-control" placeholder="Lieu" name="lieu" maxlength="250"  required><br><br>
							</div>
							<div class="form-group">
								<input type="checkbox" name="suppr" value="suppr"> Supression automatique<br>
								<label>* champs obligatoires</label><br>
								<?php echo csrf_field(); ?>
							</div>
							<button type="submit" id="register" class="btn btn-success" value="creer l'evenement">Créer l'événement</button><br>

						</div>
					</form>
				</div>
				<div class="card md-3">
					<div class="card-header">
						<h2>Liste des tâches</h2>
					</div>
					<div class="card-body">
						<h3>Type tâche 1</h3>
						<input type="checkbox" name="suppr" value="suppr"> Tâche 1<br>
						<h3>Type tâche 2</h3>
						<input type="checkbox" name="suppr" value="suppr"> Tâche 2<br>
						<h3>Type tâche 3</h3>
						<input type="checkbox" name="suppr" value="suppr"> Tâche 3<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>