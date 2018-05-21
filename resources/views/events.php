<?php include("header.php"); ?>


<div id="mes_evenements">

	   <h1>Mes Evenements </h1>
	   <a href="event"> Test Evenement</a><br>
	   <?php
		//TODO: affichage evenements
		/*use App\Http\Controllers\ControllerConnexion;
		$event = ControllerConnexion::getEventUtil();
		echo $event->first();
		foreach($event as $temp){
			echo $temp;
		}*/
		?>
</div>

<div id="evenements_publics">

   <h1>Evenements Publics</h1>
   <?php
		//TODO: affichage evenements publics
		/*use App\Http\Controllers\Controller;
		$event = ;
		echo $event->first();
		foreach($event as $temp){
			echo $temp;
		}*/
	?>
</div>

<?php include("footer.php");?>