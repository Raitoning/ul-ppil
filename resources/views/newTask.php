<?php include("header.php"); ?>

<h1>Création de tâche</h1>

<input type="button" onclick="location.href='event';" value="Retour" />

<form action="" method="post">
		<div class="newTask">

		<br>
			<input type="text" placeholder="Nom de la tâche" name="task"><br><br>
			<input type="text" placeholder="Description" name="desc"><br><br>
			Type de la tâche :
			<select name="Type de tâche">
			  <option value="typetask1">Type 1</option>
			  <option value="typetask2">Type 2</option>
			  <option value="typetask3">Type 3</option>
			  <option value="typetask4">Type 4</option>

			  //TODO séléction des différents types de tâches
			  
			</select><br><br>
			<input type="submit" id="creer" value="Creer"><br>
			<?php echo csrf_field(); ?>

		</div
	</form>

<?php include("footer.php");?>