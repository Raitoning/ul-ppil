<?php include("header.php"); ?>
<div class="col-2">
	<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/".$event_id."'\"" ; ?> value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">
	
		<div class="card mb-3">
		
			<div class="card-header bg-info text-white">
			
				<h5>Modifier l'événement:</h5>
			
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
					
						<form action="" method="post">
								
							<div class="form-group">
									
								<label>Nom de l'événement:</label>
								<input type="text" class="form-control" value="<?php echo $event->intitule ;?>" name="name" maxlength="255" required>
							</div>
									
							<div class="form-group">
										
								<label>date de début: </label>
								<input type="date" class="form-control" name="dateDeb" value=<?php echo $event->dateDebut; ?> required>
							</div>

							<div class="form-group">
										
								<label>date de fin: </label>
								<input type="date" class="form-control" name="dateFin" value=<?php echo $event->dateFin; ?> required>
							</div>

							<p>Type: </p>

							<div class="form-check">
									
								<input class="form-check-input" type="radio" name="genre" value="Public" <?php if($event->public == 1) echo "checked"; ?> >
								<label class="form-check-label">Public</label>
							</div>

							<div class="form-check">
						  		<input class="form-check-input" type="radio" name="genre" value="Privé" <?php if(!$event->public == 1) echo "checked"; ?> >
								<label class="form-check-label">Privé</label>

							</div>

							<div class="form-group">
									
								<label>Description:</label>
								<input type="text" class="form-control" name="desc" maxlength="250" value="<?php echo $event->description; ?>" required>
							</div>

							<div class="form-group">

								<label>Lieu: </label>
								<input type="text" class="form-control" placeholder="Lieu" name="lieu" maxlength="250" value="<?php echo $event->lieu; ?>" required>
							</div>

							<div class="form-check">

								<input class="form-check-input" type="checkbox" name="suppr" value="suppr" <?php if($event->suppressionAutomatique == 1) echo "checked"; ?> >
								<label class="form-check-label">
									Supression automatique
								</label>
							</div>

							<br>
	
							<div class="row">

								<div class="col-auto">

									<button type="submit" id="register" class="btn btn-success mt-1" value="enregistrer les modifications" style="margin-bottom: 10px;">Enregistrer</button><br>

								</div>
								<?php
									use App\Http\Controllers\ControllerParticipants;
									if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id)){
										echo "<div class='col-auto'>
												<input type=\"button\" class=\"btn btn-danger mt-1\" onclick=\"location.href='suppression/".$event_id."';\" value=\"Supprimer l'événement\" />
											</div>";
										}	
									?>
							</div>
							</div>

							<?php echo csrf_field(); ?>
						</form>
					</div>
				</div>
			</div>


	
<?php include("footer.php");?>
