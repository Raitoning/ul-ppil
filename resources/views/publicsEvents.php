<?php include("header.php"); ?>
<div class="container">
	<div class="alert alert-dark" role="alert">
		<label>Vous êtes en accès anonyme</label>
	</div>
	<div id="evenements_publics" class="row">
		<h1>Evénements Publics</h1><br>
	   <?php
			//affichage evenements publics
			use App\Http\Controllers\ControllerEvenement;
			ControllerEvenement::getPublicsEvents();
		?>
	</div>
</div>
<?php include("footer.php");?>