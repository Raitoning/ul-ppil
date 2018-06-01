<?php include("header.php"); ?>

<div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='/'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="alert alert-warning" role="alert">

			Vous êtes en accès anonyme
		</div>

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Événements Publics</h5>
			</div>

			<div class="card-body">

				<?php
				//affichage evenements publics
				use App\Http\Controllers\ControllerEvenement;
				$events = ControllerEvenement::getPublicsEvents();
				
				foreach($events as $event){
					echo "<div class='card md-3'>

							<div class='card-header bg-secondary'>

								<h5><a class='text-white' href='consultationPublic/".$event->evenement_id."'>".$event->intitule."</a></h5>
							</div>

							<div class='card-body'>
								<p class='card-text'>Date de début: ".$event->dateDebut."</p>
								<p class='card-text'>Date de fin: ".$event->dateFin."</p>
								<p class='card-text'>Description: ".$event->description."</p>
							</div>
						</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>