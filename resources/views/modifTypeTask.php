<?php include("header.php");
use App\Http\Controllers\ControllerTypeTache;
$type = ControllerTypeTache::getType($type_id) ;
?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/taskType'" value="Retour" />
</div>

<br>

<div class="d-flex justify-content-center align-items-center container">

		<div class="col-10">

			<div class="card mb-6">

				<div class="card-header bg-info text-white">

					<h5>Modifier le type de tâche:</h5>
				</div>

				<div class="card-body">

					<form action="" method="post">
							
							<div class="form-group">

								<label>Nom du type de tâche :</label>
								<input type="text" class="form-control" value="<?php echo $type->nomtypetache ;?>" name="nom" required >
							</div>

							<div class="form-group">

								<label for="text-input">
									Nombre de Champs Textuels
								</label>
								<input class="form-control" type="number" min="0" value=<?php echo $type->texte ;?> id="text-input" name="text">
							</div>

							<div class="form-group">

								<label for="img-input">
									Nombre d'Images
								</label>
								<input class="form-control" type="number" min="0" value=<?php echo $type->photo ;?> id="img-input" name="img">
							</div>

							<div class="form-check">

								<input type="checkbox" class="form-check-input" name="checkEnddate" value="Enddate" <?php if($type->datefin == 1) echo "checked" ;?> >
								<label class="form-check-label">
									Date de fin
								</label>
							</div>

							<div class="form-check">

								<input type="checkbox" class="form-check-input" name="checkReparti" value="Reparti" <?php if($type->quantite == 1 ) echo "checked" ;?>>
								<label class="form-check-label">
									Quantite
								</label>
							</div>

							<div class="col-auto">
								<input type="submit" id="modifier" class="btn btn-success mt-1" value="Modifier">
								<?php echo csrf_field(); ?>
							</div>
						</div>
					</div>
				</form>
	</div>
</div>

<?php include("footer.php");?>