<?php include("header.php"); ?>
<div class="container">
	<div class="alert alert-dark" role="alert">
		<label>Vous êtes en accès anonyme</label>
	</div>
	<div id="evenements_publics" class="row">
		<h1>Evénements Publics</h1><br>
	</div>
	   <?php
			//affichage evenements publics
			use App\Http\Controllers\ControllerEvenement;
			$events = ControllerEvenement::getPublicsEvents();
			
			foreach($events as $event){
				echo "<div style='bloc'>
				<p style='font-size:20px;'><a href='consultationPublic/".$event->evenement_id."'>".$event->intitule."</a></p><br>
				<p>Date de début: ".$event->dateDebut."</p>
				<p>Date de fin: ".$event->dateFin."</p>
				<p>Description: ".$event->description."</p>
				</div>";
			}
		?>

</div>
<?php include("footer.php");?>
