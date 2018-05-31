<?php include("header.php");

use App\Http\Controllers\ControllerEvenement;
use App\Http\Controllers\ControllerParticipants;
use App\Http\Controllers\ControllerTache;
?>

<div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='/events'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Détails de l'événement</h5>
			</div>

			<div class="card-body">

				<p class="card-text">Nom de l'événement:

					<?php
					//affichage du nom de l'évènement
					$event = ControllerEvenement::getEvent($event_id);  //TODO cas général
					$tasks = ControllerTache::getTask($event_id);
					echo $event->intitule ;
					?>

				</p>

				<p class="card-text">Description de l'événement:

					<?php
					//affichage descriptif de l'evenement
					echo $event->description ;
					
					?>
				</p>

				<p class="card-text">Cet événement aura lieu à :

					<?php
					//affichage lieu de l'evenement
					echo $event->lieu ;
					
					?>

				</p>

				<p class="card-text">Date de début :
					<?php
					//affichage date debut evenement
					echo $event->dateDebut ;
					?>
				</p>

				<p class="card-text">Date de fin :
					<?php
					//affichage date fin evenement
					echo $event->dateFin ;
					?>
				</p>


				<p class="card-text">Ensemble des tâches :

					<?php
					
					
					foreach ($tasks as $task) {
						echo '<a class="card-link" href="task/'.$task->tache_id.'">'.$task->nom.'</a>';
					}
					//TODO: affichage tâches de l'evenement
					/*
					$desc = ControllerEvenement::getTasks();
					echo $desc ;
					*/
					?>
				</p>

				<div class="row">

					<?php
							
							if(! ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) && ! ControllerParticipants::estEditeur($event_id, Session::get('utilisateur')->utilisateur_id) && controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
								echo "<div class=\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-success mt-1\" onclick=\"location.href='changerDroits/".$event_id."';\" value=\"Demander des droits\" />
								</div>" ;
							}
							
							if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) || ControllerParticipants::estEditeur($event_id, Session::get('utilisateur')->utilisateur_id)){
								
								echo "<div class=_\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-primary mt-1\" onclick=\"location.href='modifEvent/".$event_id."';\" value=\"Modifier l'événement\" />
								</div>" ;
							}
							
							if(controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
								echo "<div class=\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-primary mt-1\" onclick=\"location.href='participants/".$event_id."';\" value=\"Participants\" />
								</div>" ;
							}
							
							if(!ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) && controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
								echo "<div class=\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-danger mt-1\" onclick=\"location.href='desinscription/".$event_id."';\" value=\"Se désinscrire\" />
								</div>" ;
							}
							if(controllerEvenement::estPublic($event_id) && !controllerParticipants::participe(Session::get('utilisateur')->utilisateur_id,$event_id)){
								echo"<div class=\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-success mt-1\" onclick=\"location.href='demandeInscription/".$event_id."';\" value=\"S'inscrire\" />
								</div>" ;
							}
							
							if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id) || ControllerParticipants::estEditeur($event_id, Session::get('utilisateur')->utilisateur_id)){
							$tasks = App\Http\Controllers\ControllerTypeTache::getTypeTask(Session::get('utilisateur')->utilisateur_id);
							echo "<form class='form-inline' method='post' action='newTask/".$event_id."';\">

									<div class=\"col-md-auto\">

										<input name='ev' type='hidden' value='".$event_id."'>

										<select class='custom-select' name='typetache'>";
										
										foreach ($tasks as $task) {
											echo '<option value='.$task->typetache_id.'>'.$task->nomtypetache.'</option>';
										}
										echo csrf_field();
										echo "</select>";
										echo "</div>";
										echo "<div class='\"col-md-auto\"'>";
										echo "<input type=\"submit\" class=\"btn btn-primary mt-1\" value='Ajouter une tache'/>";
										echo "</div>
									</form>";
							}
							?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php include("footer.php");?>