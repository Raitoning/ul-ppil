<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

	<div class="container">
		<div style="display : flex; justify-content: space-between;">
			<div class="card md-3 col-5" style="padding : 0 0 0 0;">
					<div class="card-header">
					   <h1>Mes Evenements </h1>
					</div>
				   <?php
					//TODO: affichage evenements
					use App\Http\Controllers\ControllerEvenement;
					$events = ControllerEvenement::getUserEvents();
					foreach($events as $event){
						echo "<div class='card border-primary md-2'>
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
			<div class="card md-3 col-5" style="padding : 0 0 0 0;">
				<div class="card-header">
				   <h1>Evenements Publics</h1>
				</div>
			   <?php
					//affichage evenements publics
					$events = ControllerEvenement::getPublicsEvents();
					foreach($events as $event){
						echo "<div class='card'>
						<div class='card-header bg-secondary'>
						<a href='event/".$event->evenement_id."' class='text-light'  style='font-size:20px;'>".$event->intitule."</a>
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

<?php include("footer.php");?>
