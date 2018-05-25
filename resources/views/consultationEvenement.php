<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<label>Nom événement : </label>

		<?php
			//affichage du nom de l'evenement
			use App\Http\Controllers\ControllerEvenement;
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

		<?php
			if(!ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id)){
				echo 
				"<div class=\"col-2\">
				<input type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='desinscription/".$event_id."';\" value=\"Se désinscrire\" />
				</div>" ;
			}
			
		?>

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

</div>

<?php include("footer.php");?>