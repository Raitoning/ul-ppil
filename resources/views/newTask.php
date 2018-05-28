<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
$event = substr($link, strrpos($link, '/') + 1);
use App\Http\Controllers\ControllerTypeTache;
use App\Http\Controllers\ControllerParticipants;
$utilisateur = Session::get('utilisateur')->utilisateur_id;
$tasks = ControllerTypeTache::getTypeTask($utilisateur);
?>

<div class="d-flex justify-content-center align-items-center container">
	<div class="col-10">
		<div class="card mb-3">
			<div class="card-header">
				<h1>Creer une tâche:</h1>
			</div>

			<?php if(Session::has('erreurFormulaire')){
				echo "<div class='alert alert-danger' role='alert'>"
					.Session::get('erreurFormulaire').
					"</div>";
					Session::forget('erreurFormulaire');
				}
				?>

			<div class="card-body" style="display : flex; justify-content: space-around;">
				<div class="col-6">
					<form action="" method="post">
						<br>
						<div class="form-group">
							<label>Nom de la tâche :</label>
							<br>
							<input type="text" placeholder="Nom de la tâche" name="task">
							<br>
							<br>
						</div>
						<div class="form-group">
							<label>Description :</label>
							<br>
							<input type="text" placeholder="Description" name="desc">
							<br>
							<br>
						</div>
						<div class="form-group">
							<label>Quantité :</label>
							<br>
							<input type="text" placeholder="Quantité" name="quantity">
							<br>
							<br>
						</div>
						<div class="form-group">
							<label>Type de la tâche : </label>
							<select name="Type de tâche">
								<?php
								foreach ($tasks as $task) {
									//echo '<br>'.$task->nom.' : '.$task->description;
								echo '<option value="typetask1">'.$task->nomtypetache.'</option>';
								}

								?>

								//TODO séléction des différents types de tâches
							</select>
							<br>
							<br>
						</div>
						<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo " $event "; ?>';" value="Retour" />
						<input type="submit" id="creer" class="btn btn-primary" value="Creer">
						<?php echo csrf_field(); ?>
				</div>
				<div class="col-6">
					<div class="card md-3">
						<div class="card-header">
							<h2>Participants</h2>
						</div>
						<div class="card-body">
							<?php


							$participants = App\Http\Controllers\ControllerParticipants::getParticipants($event);
							foreach($participants as $participant){
								echo "<li class='list-group-item'><input type='checkbox' value=''>".$participant->pseudo."</li></a>" ;							}

							?>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>

<?php include("footer.php");?>
