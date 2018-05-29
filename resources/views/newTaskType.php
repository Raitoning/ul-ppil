<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
$event = substr($link, strrpos($link, '/') + 1);
?>
<div class="d-flex justify-content-center align-items-center container">
		<div class="col-10">
			<div class="card mb-3">
				<div class="card-header">
					<h1>Nouveau Type de Tache:</h1>
				</div>

	<div class="card-body">
		<form action="" method="post">
			<div class="newTask">
				<br>
				<div class="form-group ">
					<label>Nom du type de tâche :</label>
					<input type="text" class="form-control" placeholder="Type de tache" name="nom"><br>
				</div>
				<div class="form-group">
					<label for="text-input">Nombre de Champs Textuels</label>
						<div class="col-10">
							 <input class="form-control" type="number" min="0" value="0" id="text-input" name="text">
						</div>
				</div>

				<div class="form-group">
					<label for="img-input">Nombre d'Images</label>
						<div class="col-10">
							 <input class="form-control" type="number" min="0" value="0" id="img-input" name="img">
						</div>
				</div>

				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="checkEnddate" value="Enddate">
					Date de fin
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="checkReparti" value="Reparti">
					Quantite
					</label>
				</div>

				<div style="display: flex;">
					<div class="col_2" style="margin-right: 10px;">
						<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo "$event"; ?>';" value="Retour" />
					</div>
					<div class="col_2">
						<input type="submit" id="creer" class="btn btn-success" value="Créer"><br>
						<?php echo csrf_field(); ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include("footer.php");?>
