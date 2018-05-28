<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
$event = substr($link, strrpos($link, '/') + 1);
?>
<div class="container card md-3">
	<div class="row card-header">
		<h1>Nouveau Type de Tache:</h1>
	</div>

	<div class="row card-body">
		<form action="" method="post">
			<div class="newTask">
				<br>
				<div class="form-group ">
					<label>Nom du type tâche :</label>
					<input type="text" class="form-control" placeholder="Type de tache" name="task"><br>
				</div>
				<div class="form-group">
					<label for="text-input">Nombre de Champs Textuels</label>
						<div class="col-10">
							 <input class="form-control" type="number" min="0" value="0" id="text-input">
						</div>
				</div>

				<div class="form-group">
					<label for="img-input">Nombre d'Images</label>
						<div class="col-10">
							 <input class="form-control" type="number" min="0" value="0" id="img-input">
						</div>
				</div>

				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" id="checkEnddate" value="Enddate">
					Date de fin
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label">
					<input type="checkbox" class="form-check-input" id="checkAssign" value="Assign">
					Assigne
					</label>
				</div>

				<div class="form-check">
					<label class="form-check-label">
					<input type="checkbox" class="form-check-input" id="checkReparti" value="Reparti">
					Repartition
					</label>
				</div>

				<div class="row">
					<div class="col_2">
						<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo "$event"; ?>';" value="Retour" />
					</div>
					<div class="col_2">
						<input type="submit" id="creer" class="btn btn-success" value="Creer"><br>
						<?php echo csrf_field(); ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include("footer.php");?>
