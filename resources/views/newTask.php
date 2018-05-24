<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<h1>Création de tâche</h1>
	</div>

	<div class="row">
		<form action="" method="post">
			<div class="newTask">
				<br>
				<div class="form-group">
					<label>Nom de la tâche :</label><br>
					<input type="text" placeholder="Nom de la tâche" name="task"><br><br>
				</div>
				<div class="form-group">
					<label>Description :</label><br>
					<input type="text" placeholder="Description" name="desc"><br><br>
				</div>
				<div class="form-group">
				<label>Type de la tâche : </label>
					<select name="Type de tâche">
					  <option value="typetask1">Type 1</option>
					  <option value="typetask2">Type 2</option>
					  <option value="typetask3">Type 3</option>
					  <option value="typetask4">Type 4</option>

					  <!-- TODO séléction des différents types de tâches -->
					</select><br><br>
				</div>
				<div class="row">
					<div class="col_2">
						<input type="button" class="btn btn-primary" onclick="location.href='event';" value="Retour" />
					</div>
					<div class="col_2">
						<input type="submit" id="creer" class="btn btn-primary" value="Creer"><br>
						<?php echo csrf_field(); ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include("footer.php");?>