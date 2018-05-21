<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div id="mes_evenements">

					   <h1>Mes Evenements </h1>
					   <a href="event"> Test Evenement</a><br>
					   <?php
						//TODO: affichage evenements
						use App\Http\Controllers\ControllerEvenement;
						ControllerEvenement::getUserEvents();
						?>
				</div>
			</div>
			<div class="col-6">
				<div id="evenements_publics">
				   <h1>Evenements Publics</h1>
				   <?php
						//affichage evenements publics
						ControllerEvenement::getPublicsEvents();
					?>
				</div>
		</div>
	</div>

<?php include("footer.php");?>