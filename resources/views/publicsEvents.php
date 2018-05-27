<?php include("header.php"); ?>
<div class="container">
	<div class="alert alert-dark" role="alert">
		<label>Vous êtes en accès anonyme</label>
	</div>
	<div class="card md-3">
		<div id="evenements_publics" class="card-header">
			<h1>Evénements Publics</h1><br>
		</div>
		<div class="card-body">
			<?php
				//affichage evenements publics
				use App\Http\Controllers\ControllerEvenement;
				$events = ControllerEvenement::getPublicsEvents();
				
				foreach($events as $event){
					echo "<div class='card md-3'>
						<div class='card-header'>
							<h2 style='font-size:20px;'><a href='consultationPublic/".$event->evenement_id."'>".$event->intitule."</a></h2>
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
<?php include("footer.php");?>
