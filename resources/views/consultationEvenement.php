<?php include("header.php"); ?>
 
 <div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='/publicsEvents'" value="Retour" />
</div>

<br>

<div class="d-flex justify-content-center container">

	<div class="col-10">

		<div class="card mb-6">

			<div class="card-header bg-info text-white">

				<h5>Consultation public de l'événement</h5>
			</div>

			<div class="card-body">
				
				<p class="card-text">Nom événement: <?php
						//affichage du nom de l'evenement
						use App\Http\Controllers\ControllerEvenement;
						$event = ControllerEvenement::getEvent($event_id);  //TODO cas général
						echo $event->intitule ;
					?></p>

				<p class="card-text">Descriptif de l'événement: <?php
						//affichage descriptif de l'evenement
						echo $event->description ;
						
					?></p>

				<p class="card-text">Cet événement aura lieu à: <?php
						//affichage lieu de l'evenement
						echo $event->lieu ;
						
					?></p>

				<p class="card-text">Date de début: <?php
						//affichage date debut evenement
						echo $event->dateDebut ;
					?></p>
					

				<p class="card-text">Date de fin: <?php
						//affichage date fin evenement
						echo $event->dateFin ;
					?></p>

				<p class="card-text">Ensemble des tâches</p>
					
				<?php
						//TODO: affichage tâches de l'evenement
						/*
						$desc = ControllerEvenement::getTasks();
						echo $desc ;
						*/
					?>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php");?>