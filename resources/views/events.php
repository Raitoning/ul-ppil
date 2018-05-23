<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div id="mes_evenements">

					   <h1>Mes Evenements </h1>
					   <br>
					   <?php
						//TODO: affichage evenements
						use App\Http\Controllers\ControllerEvenement;
						$events = ControllerEvenement::getUserEvents();
						foreach($events as $event){
							echo "<div style='bloc'>
							<p style='font-size:20px;'> <a href='event/".$event->evenement_id."'>".$event->intitule."</a></p><br>
							<p>Date de début: ".$event->dateDebut."</p>
							<p>Date de fin: ".$event->dateFin."</p>
							<p>Description: ".$event->description."</p>
							</div>";
						}
						?>
				</div>
			</div>
			<div class="col-6">
				<div id="evenements_publics">
				   <h1>Evenements Publics</h1>
				   <?php
						//affichage evenements publics
						$events = ControllerEvenement::getPublicsEvents();
						foreach($events as $event){
							echo "<div style='bloc'>
							<p style='font-size:20px;'> <a href='event/".$event->evenement_id."'>".$event->intitule."</a></p><br>
							<p>Date de début: ".$event->dateDebut."</p>
							<p>Date de fin: ".$event->dateFin."</p>
							<p>Description: ".$event->description."</p>
							</div>";
						}
					?>
				</div>
		</div>
	</div>

<?php include("footer.php");?>