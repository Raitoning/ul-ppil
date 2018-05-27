<?php include("header.php"); ?>
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
						echo "<div class='card md-3'>
						<div class='card-header'>
						<a href='event/".$event->evenement_id."' style='font-size:20px;'>".$event->intitule."</a>
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
			<div class="card md-3 col-5" style="padding : 0 0 0 0;">
				<div class="card-header">
				   <h1>Evenements Publics</h1>
				</div>
			   <?php
					//affichage evenements publics
					$events = ControllerEvenement::getPublicsEvents();
					foreach($events as $event){
						echo "<div class='card'>
						<div class='card-header'>
						<a href='event/".$event->evenement_id."'style='font-size:20px;'>".$event->intitule."</a>
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