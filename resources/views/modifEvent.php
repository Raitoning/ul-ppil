<?php include("header.php"); ?>
<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">
	
		<div class="card mb-3">
		
			<div class="card-header bg-info text-white">
			
				<h3>Modifier l'événement :</h3>
			
			</div>
			
			<div class="card-body">
			

				<?php if(Session::has('erreurInscription')){
						echo "<div class='alert alert-danger' role='alert'>"
								.Session::get('erreurInscription').
							"</div>";
						Session::forget('erreurInscription');
					}

					//récupérer l'événement
					use App\Http\Controllers\ControllerEvenement;
					$event = ControllerEvenement::getEvent($event_id);  //TODO cas général
				?>
					<div class="col-12">
					
						<form action="" method="post">
						
							<div class="newEvent"><br>
							
								<div class="col-10">
								
									<div class="form-group">
									
										<label>Nom de l'événement :</label><br>
										
										<input type="text" class="form-control" value="<?php echo $event->intitule ;?>" name="name" maxlength="255" required><br>
									
									</div>
									
									<div class="form-group">
										
										<label>date de début : </label><br>
										<input type="date" class="form-control" name="dateDeb" value=<?php echo $event->dateDebut; ?> required><br>
										<label>date de fin : </label><br>
										<input type="date" class="form-control" name="dateFin" value=<?php echo $event->dateFin; ?> required><br>
									
									</div>
									<div class="form-group">
									
										<label>Type : </label>
										<input type="radio" name="genre" value="Public" <?php if($event->public == 1) echo "checked"; ?> > Public
						  				<input type="radio" name="genre" value="Privé" <?php if(!$event->public == 1) echo "checked"; ?> > Privé<br>
									
									</div>
									<div class="form-group">
									
										<label>Description :</label><br>
										<input type="text" class="form-control" name="desc" maxlength="250" value="<?php echo $event->description; ?>" required><br>
									
									</div>
									<div class="form-group">
										
										<label>Lieu : </label><br>
										<input type="text" class="form-control" placeholder="Lieu" name="lieu" maxlength="250" value="<?php echo $event->lieu; ?>" required><br><br>
									
									</div>
								
								</div>
								<div id="tâches" class="card md-3">
									
									<div class="card-header bg-secondary text-white">
										
										<h3>Ensemble des tâches</h3>
									
									</div>
									<div class="card-body">
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

								<div class="form-group">
									
									<input type="checkbox" name="suppr" value="suppr" <?php if($event->suppressionAutomatique == 1) echo "checked"; ?> > Supression automatique<br>
									<?php echo csrf_field(); ?>
								
								</div>
								
								<button type="submit" id="register" class="btn btn-success" value="enregistrer les modifications" style="margin-bottom: 10px;">Enregistrer les modifications</button><br>

								<?php
									use App\Http\Controllers\ControllerParticipants;
									if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id)){
										echo 
										"
										<input type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='suppression/".$event_id."';\" value=\"Supprimer l'événement\" />
										" ;
									}	
								?>

								
								<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/".$event_id."'\"" ; ?> value="Retour"/>	
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	
<?php include("footer.php");?>
