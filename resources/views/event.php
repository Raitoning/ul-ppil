<?php include("header.php"); ?>

<h1>Nom événement</h1>

<input type="button" onclick="location.href='modifEvent';" value="Modifier l'événement" />
<div id="Desc">
	<h2>Descriptif de l'événement</h2>

	<?php
		//TODO: affichage descriptif evenement
		/*use App\Http\Controllers\ControllerEvenement;
		$desc = ControllerConnexion::getDesc();
		echo $desc ;
		*/
	?>
</div>

<div id="Lieu">
	<h3>Lieu de l'événement</h3>

	Cet événement aura lieu a :

	<?php
		//TODO: affichage lieu evenement
		/*use App\Http\Controllers\ControllerEvenement;
		$desc = ControllerConnexion::getLieu();
		echo $desc ;
		*/
	?>

</div>

<div id="date">
	<h4> Dates</h4>

	Date de début : 
	<?php
		//TODO: affichage date evenement
		/*use App\Http\Controllers\ControllerEvenement;
		$desc = ControllerConnexion::getDate();
		echo $desc ;
		*/
	?>
	<br>
	
	Date de fin   :
</div>


<div id="tâches">
	<h4> Tâches</h4>
 
	<input type="button" onclick="location.href='newTask';" value="Ajouter une tâche" />
	
	<?php
		//TODO: affichage tâches de l'evenement
		/*use App\Http\Controllers\ControllerEvenement;
		$desc = ControllerConnexion::getTasks();
		echo $desc ;
		*/
	?>
	<br>
	
</div>

<?php include("footer.php");?>