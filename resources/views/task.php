<?php
	include("header.php");
	use App\Http\Controllers\ControllerEvenement;
	use App\Http\Controllers\ControllerParticipants;
	use App\Http\Controllers\ControllerTache;
	use App\models\typetache;
	use App\models\tache;

	$taskInfo= ControllerTache::getTaskInfo($tache_id);
	$event = ControllerTache::getEvent($tache_id);

	$type = typetache::where('typetache_id','=',$taskInfo->typetache_typetache_id)->first();
?>

<div class="col-2">
	<!-- TODO: Mettre lien retour -->
	<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo $event->evenement_id ; ?>'" value="Retour" />
</div>

<br>

<div class="d-flex justify-content-center container">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Détails de la tâche</h5>
			</div>

			<div class="card-body">

				<p class="card-text">Nom de la tâche :
					<?php echo $taskInfo->nom; ?>
				</p>

				<p class="card-text">Descriptif de la tâche :
					<?php echo $taskInfo->description; ?>
				</p>
			
				<?php if($type->quantite >= 1){ ?>
					
					<p clas="card-text">Quantité:
						<?php echo $taskInfo->quantiteTotal ;?>
					</p>

				<?php
					}
					$i = tache::where('tache_id','=',$taskInfo->tache_id)->first()->text()->get();
					$k = 1;
					foreach($i as $o){
						echo "<p class='card-text'>Information ".$k." : ".$o->texte."</p>";
						$k++;
					}
				?>

				<?php
					$i = tache::where('tache_id','=',$taskInfo->tache_id)->first()->photo()->get();
					foreach($i as $o){
						echo "<img class='img-thumbnail' src='/".$o->url."'>";
					}
				?>

				<p class="card-text">Participants:</p>

				<ul class="list-group">
					<?php

						$utilisateurs = ControllerTache::getParticipants($tache_id);
						
						if(ControllerTache::estProprio($tache_id,Session::get('utilisateur')->utilisateur_id)) {
							
							foreach($utilisateurs as $util) {
								
								echo "<form action='droits' method='post'>
								
									<li class='list-group-item list-group-item-action'>
								
										<div class='row align-items-center'>
								
											<div class='col-auto'>

												<p class='card-text'>".$util->pseudo."</p>
											</div>

											<div class='col-auto'>

												<input type='button' class='btn btn-danger mt-1' onclick='location.href=\"/event/task/supprParticipant/".$tache_id."/".$util->utilisateur_id."\";' value='Supprimer' />
											</div>
										</div>
									</li>

								<input type='hidden' name='id_event' value=''>
								<input type='hidden' name='id_user' value='".$util->utilisateur_id."'>
							</form>";
							}
						} else {

							foreach($utilisateurs as $util){

							echo "<li class='list-group-item list-group-item-action'>".$util->pseudo."</li>";
							}
						}
					?>
				</ul>

				<div class="row">
					<?php 
						if(!ControllerTache::estValide($tache_id)){
							if(ControllerTache::estProprio($tache_id, Session::get('utilisateur')->utilisateur_id)){
								echo
								"<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-primary mt-1\" onclick=\"location.href='/event/task/modif/". $tache_id. "';\" value=\"Modifier\" />
								</div>" ;
								
								echo
								"<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-success mt-1\" onclick=\"location.href='/event/task/valide/". $tache_id. "';\" value=\"Valider la tâche\" />
								</div>" ;
								
								echo
								"<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-success mt-1\" onclick=\"location.href='/event/task/ajoutParticipant/". $tache_id. "';\" value=\"Ajouter participants\" />
								</div>" ;
							}
							if(ControllerTache::participe(Session::get('utilisateur')->utilisateur_id, $tache_id)){
								if( ! is_null($taskInfo->quantiteTotal)){
									echo "<div class=\"col-md-auto\">
									<input type=\"button\" class=\"btn btn-primary mt-1\" onclick=\"location.href='contribution/".$tache_id."';\" value=\"Modifier ma contribution \" />
									</div>" ;
								}

								echo "<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-danger mt-1\" onclick=\"location.href='desinscription/".$tache_id."';\" value=\"Se désinscrire\" />
								</div>" ;
							} else {
								echo "<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-success mt-1\" onclick=\"location.href='inscription/".$tache_id."';\" value=\"S'inscrire \" />
								</div>" ; 
							}
						}else{
							
							if(ControllerTache::estProprio($tache_id, Session::get('utilisateur')->utilisateur_id)){
								echo "<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-danger mt-1\" onclick=\"location.href='/event/task/annuleValide/". $tache_id. "';\" value=\"Annuler la validation de la tâche\" />
								</div>" ;
							}
							
							if(ControllerTache::participe(Session::get('utilisateur')->utilisateur_id, $tache_id)){
								echo "<div class=\"col-md-auto\">
								<input type=\"button\" class=\"btn btn-danger mt-1\" onclick=\"location.href='desinscription/".$tache_id."';\" value=\"Se désinscrire\" />
								</div>" ;
							}
						}
					
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'?>