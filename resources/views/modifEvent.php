<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<h1>Modifier l'événement :</h1>
		</div>

		<?php
			use App\Http\Controllers\ControllerParticipants;
			if(ControllerParticipants::estProprio($event_id, Session::get('utilisateur')->utilisateur_id)){
				echo 
				"<div class=\"col-2\">
				<input type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='suppression/".$event_id."';\" value=\"Supprimer l'événement\" />
				</div>" ;
			}
			
			?>

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

		<div class="row">
			<div class="col-6">
				<form action="" method="post">
					<div class="newEvent"><br>
						<div class="form-group">
							<label>Nom de l'événement :</label><br>
							<input type="text" class="form-control" value=<?php echo $event->intitule; ?> name="name" maxlength="255" required><br>
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
							<input type="text" class="form-control" placeholder="Description" name="desc" maxlength="250" value=<?php echo $event->description; ?> required><br>
						</div>
						<div class="form-group">
							<label>Lieu : </label><br>
							<input type="text" class="form-control" placeholder="Lieu" name="lieu" maxlength="250" value=<?php echo $event->lieu; ?> required><br><br>
						</div>
						<div class="form-group">
							<input type="checkbox" name="suppr" value="suppr" <?php if($event->suppressionAutomatique == 1) echo "checked"; ?> > Supression automatique<br>
							<?php echo csrf_field(); ?>
						</div>
						<button type="submit" id="register" class="btn btn-success" value="enregistrer les modifications">Enregistrer les modifications</button><br>

					</div>
				</form>
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
		</div>
	</div>
	
<?php include("footer.php");?>