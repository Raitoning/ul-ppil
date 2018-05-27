<?php include("header.php"); ?>
<div class="d-flex justify-content-center align-items-center container">
		<div class="col-10">
			<div class="card mb-3">
				<div class="card-header">
					<h1>Détails de l'événement</h1>
				</div>
				<div class="card-body">
					<label>Nom événement : </label>

					<?php
						//affichage du nom de l'evenement
						use App\Http\Controllers\ControllerEvenement;
						use App\Http\Controllers\ControllerParticipants;
						$event = ControllerEvenement::getEvent($event_id);  //TODO cas général
						echo $event->intitule ;
					?>

					<div id="Desc">
						<label>Descriptif de l'événement : <br></label>

						<?php
							//affichage descriptif de l'evenement
							echo $event->description ;
							
						?>
					</div>

					<div id="Lieu">
						<label>Cet événement aura lieu à : </label>

						<?php
							//affichage lieu de l'evenement
							echo $event->lieu ;
							
						?>

					</div>

					<div id="dateDebut">
						<label>Date de début : </label>
						<?php
							//affichage date debut evenement
							echo $event->dateDebut ;
						?>
						<br>
					</div>
					<div id="dateFin">
						<label>Date de fin : </label>
						<?php
							//affichage date fin evenement
							echo $event->dateFin ;
						?>
						<br>

					</div>


					<div id="tâches">
						<label>Ensemble des tâches :</label>
						
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

				<div style="display : flex; justify-content: space-around; margin-bottom: 15px;">
					<?php

						if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) || ControllerParticipants::estEditeur($event_id, Session::get('utilisateur')->utilisateur_id)){
							echo "<div class=\"col-2\">
							<input type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='newTask';\" value=\"Ajouter une tâche\" />
							</div>" ;

							echo "<div class=_\"col-2\">
							<input type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='modifEvent/".$event_id."';\" value=\"Modifier l'événement\" />
							</div>" ;
						}

						if(controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
							echo "<div class=\"col-2\">
							<input type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='participants/".$event_id."';\" value=\"Participants\" />
							</div>" ;
						}
				
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
		</div>
	</div>
</div>

<?php include("footer.php");?>