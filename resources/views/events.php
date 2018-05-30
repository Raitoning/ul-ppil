<?php include 'header.php'; ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="row justify-content-center">

		<div class="col-md-6">

			<div class="card md-6">

				<div class="card-header bg-info text-white">

					<h5>Mes événements</h5>
				</div>

				<div class="card-body">

					<?php
					use App\Http\Controllers\ControllerEvenement;
					$events = ControllerEvenement::getUserEvents();
					foreach($events as $event){
						echo "<div class='card md-3'>
							<div class='card-header bg-info'>
								<a href='event/".$event->evenement_id."' class='text-light' style='font-size:20px;'>".$event->intitule."</a>
							</div>
							<div class='card-body'>
								<p>Date de début: ".$event->dateDebut."
									<br>Date de fin: ".$event->dateFin."
									<br>Description: ".$event->description."</p>
								</div>
							</div>";
						}
						?>
				</div>
			</div>
		</div>

		<div class="col-md-6">

			<div class="card md-6">

				<div class="card-header bg-info text-white">

					<h5 class="card-title">Événements publics</h5>
				</div>

				<div class="card-body">

					<?php
						//affichage evenements publics
						$events = ControllerEvenement::getPublicsEvents();
						foreach($events as $event){
							echo "<div class='card'>
								<div class='card-header bg-secondary'>
									<a href='event/".$event->evenement_id."' class='text-light' style='font-size:20px;'>".$event->intitule."</a>
								</div>
								<div class='card-body'>
									<p>Date de début: ".$event->dateDebut."</p>
									<p>Date de fin: ".$event->dateFin."</p>
									<p>Description: ".$event->description."</p>
								</div>
							</div>";
						}
						?>
				</div>
			</div>
		</div>
	</div>

</div>

<?php include 'footer.php'; ?>