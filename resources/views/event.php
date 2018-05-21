<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<label>Nom événement</label>
	</div>

	<div id="Desc" class="row">
		<label>Descriptif de l'événement</label>

		<?php
			//TODO: affichage descriptif evenement
			/*use App\Http\Controllers\ControllerEvenement;
			$desc = ControllerConnexion::getDesc();
			echo $desc ;
			*/
		?>
	</div>

	<div id="Lieu" class="row">
		<label>Cet événement aura lieu a :</label>

		<?php
			//TODO: affichage lieu evenement
			/*use App\Http\Controllers\ControllerEvenement;
			$desc = ControllerConnexion::getLieu();
			echo $desc ;
			*/
		?>

	</div>

	<div id="dateDebut" class="row">
		<label>Date de début :</label>
		<?php
			//TODO: affichage date evenement
			/*use App\Http\Controllers\ControllerEvenement;
			$desc = ControllerConnexion::getDate();
			echo $desc ;
			*/
		?>
		<br>
	</div>
	<div id="dateFin" class="row">
		<label>Date de fin :</label><br>
	</div>


	<div id="tâches" class="row">
		<label>Ensemble des tâches</label>
		
		<?php
			//TODO: affichage tâches de l'evenement
			/*use App\Http\Controllers\ControllerEvenement;
			$desc = ControllerConnexion::getTasks();
			echo $desc ;
			*/
		?>
		<br>
		
	</div>

	<div class="row">
		<div class="col-2">
			<input type="button" class="btn btn-primary" onclick="location.href='newTask';" value="Ajouter une tâche" />
		</div>
		<div class="col-2">
			<input type="button" class="btn btn-primary" onclick="location.href='modifEvent';" value="Modifier l'événement" />
		</div>
	</div>
</div>
<?php include("footer.php");?>