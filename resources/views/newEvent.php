<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<h1>Creer un nouvel événement :</h1>
		</div>

		<?php if(Session::has('erreurInscription')){
				echo "<div class='alert alert-danger' role='alert'>"
						.Session::get('erreurInscription').
					"</div>";
				Session::forget('erreurInscription');
			}
		?>

		<div class="row">
			<div class="col-6">
				<form action="" method="post">
					<div class="newEvent"><br>
						<div class="form-group">
							<label>Nom de l'événement :</label><br>
							<input type="text" class="form-control" placeholder="Nom de l'événement*" name="name" maxlength="255"><br>
						</div>
						<div class="form-group">
							<label>date de début* : </label><br>
							<input type="date" class="form-control" name="dateDeb"><br>
							<label>date de fin* : </label><br>
							<input type="date" class="form-control" name="dateFin"><br>
						</div>
						<div class="form-group">
							<label>Type : </label>
							<input type="radio" name="genre" value="Public" checked> Public
			  				<input type="radio" name="genre" value="Privé"> Privé<br>
						</div>
						<div class="form-group">
							<label>Description :</label><br>
							<input type="text" class="form-control" placeholder="Description*" name="desc" maxlength="250"><br>
						</div>
						<div class="form-group">
							<label>Lieu : </label><br>
							<input type="text" class="form-control" placeholder="Lieu*" name="lieu" maxlength="250"><br><br>
						</div>
						<div class="form-group">
							<input type="checkbox" name="suppr" value="suppr"> Supression automatique<br>
							<label>* champs obligatoires</label><br>
							<?php echo csrf_field(); ?>
						</div>
						<button type="submit" id="register" class="btn btn-primary" value="creer l'evenement">Créer l'evenement</button><br>

					</div>
				</form>
			</div>
			<div class="col-6">
				<h2>Liste de tâches</h2>
			</div>
		</div>
	</div>
	
<?php include("footer.php");?>