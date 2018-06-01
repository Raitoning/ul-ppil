<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
$event = substr($link, strrpos($link, '/') + 1);
?>

<div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='/taskType';" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Nouveau type de tâche:</h5>
			</div>

			<div class="card-body">

				<form action="" method="post">

					<div class="form-group ">

						<label>Nom du type tâche :</label>
						<input type="text" class="form-control" placeholder="Type de tache" name="nom" required>
					</div>

					<div class="form-group">

						<label for="text-input">Nombre de champs textuel</label>
						<input class="form-control" type="number" min="0" value="0" id="text-input" name="text">
					</div>

					<div class="form-group">

						<label for="img-input">Nombre d'image</label>
						<input class="form-control" type="number" min="0" value="0" id="img-input" name="img">
					</div>

					<div class="form-check">

						<input type="checkbox" class="form-check-input" name="checkEnddate" value="Enddate" id="enddate">
						<label class="form-check-label" for="enddate">Date de fin</label>
					</div>

					<div class="form-check">

						<input type="checkbox" class="form-check-input" name="checkReparti" value="Reparti" id="repartit">
						<label class="form-check-label" for="repartit">Quantité</label>
					</div>

					<br>

					<div class="row">

						<div class="col-md-auto">

							<input type="submit" id="creer" class="btn btn-success" value="Créer">

							<?php echo csrf_field(); ?>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php include("footer.php");?>