<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<label>Nom événement : </label>

		<?php
			//affichage du nom de l'evenement
			use App\Http\Controllers\ControllerEvenement;
			use App\Http\Controllers\ControllerParticipants;
			$event = ControllerEvenement::getEvent($event_id);  //TODO cas général
			echo $event->intitule ;
		?>
	</div>

	<div id="Desc" class="row">
		<label>Descriptif de l'événement : <br></label>

		<?php
			//affichage descriptif de l'evenement
			echo $event->description ;
			
		?>
	</div>

	<div id="Lieu" class="row">
		<label>Cet événement aura lieu à : </label>

		<?php
			//affichage lieu de l'evenement
			echo $event->lieu ;
			
		?>

	</div>

	<div id="dateDebut" class="row">
		<label>Date de début : </label>
		<?php
			//affichage date debut evenement
			echo $event->dateDebut ;
		?>
		<br>
	</div>
	<div id="dateFin" class="row">
		<label>Date de fin : </label>
		<?php
			//affichage date fin evenement
			echo $event->dateFin ;
		?>
		<br>

	</div>


	<div id="tâches" class="row">
		<label>Ensemble des tâches</label>
		
		<?php
			//TODO: affichage tâches de l'evenement
			/*
			$desc = ControllerEvenement::getTasks();
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
			<input type="button" class="btn btn-info" <?php echo "onclick=\"location.href='modifEvent/".$event_id."';\"" ;?> value="Modifier l'événement" />
		</div>
		<div class="col-2">
			<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='participants/".$event_id."';\"" ;?> value="Participants" />
		</div>
		<?php
			if(!ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) && controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
				echo 
				"<div class=\"col-2\">
				<input type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='desinscription/".$event_id."';\" value=\"Se désinscrire\" />
				</div>" ;
			}
			 if(controllerEvenement::estPublic($event_id) && !controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
			 	echo 
				"<div class=\"col-2\">
				<input type=\"button\" class=\"btn btn-success\" onclick=\"location.href='demandeInscription/".$event_id."';\" value=\"S'inscrire\" />
				</div>" ;
			 }
			
		?>
	</div>
</div>

<?php include("footer.php");?>