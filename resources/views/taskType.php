<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

<br>


	<div class="content justify-content-center d-flex">

		<div class="col-10">
	
			<div class="card text-center">
					
					<div class="card-header bg-info text-white">
					   
					   <h5>Mes Types de tâche </h5>
					
					</div>
					<div class='card-body text-white mt-1'>

						<?php
							use App\Http\Controllers\ControllerTypeTache;
							$types = ControllerTypeTache::getUserTypeTask();
							foreach($types as $type){
								echo "<div class='card border-primary text-white mt-1'>

										<div class='card-header bg-info'>

											".$type->nomtypetache."
										</div>

										<div class='card-body'>

											<input type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='/taskType/modifTypeTask/".$type->typetache_id."'\" value=\"Modifier\" />
											<input type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='/taskType/supprTypeTask/".$type->typetache_id."'\" value=\"Supprimer\" />
										</div>
									</div>";
							}
						?>

						<input type="button" class="btn btn-success mt-1" onclick="location.href='/taskType/ajoutTypeTache'" value="Nouveau type de tâche" />
					</div>
				</div>
		</div>
</div>

<?php include("footer.php");?>
