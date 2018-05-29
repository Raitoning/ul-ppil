<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
	<input type="button" class="btn btn-success" onclick="location.href='/taskType/ajoutTypeTache'" value="Nouveau type de tâche" />
</div>

	<div class="container">
		<div style="display : flex; justify-content: space-between;">
			<div class="card md-3 col-5" style="padding : 0 0 0 0;">
					<div class="card-header">
					   <h1>Mes Types de tâche </h1>
					</div>
				   <?php
					use App\Http\Controllers\ControllerTypeTache;
					$types = ControllerTypeTache::getUserTypeTask();
					foreach($types as $type){
						echo "<div class='card border-primary md-2'>
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
			</div>
	</div>

<?php include("footer.php");?>
