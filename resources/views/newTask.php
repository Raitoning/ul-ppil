<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
use App\Http\Controllers\ControllerTypeTache;
use App\Http\Controllers\ControllerParticipants;
$utilisateur = Session::get('utilisateur')->utilisateur_id;
Session::put('typeTache',$type);
?>

<div class="d-flex justify-content-center align-items-center container">
	<div class="col-10">
		<div class="card mb-3">
			<div class="card-header">
				<h1>Creer une tâche:</h1>
			</div>

			<div class="card-body" style="display : flex; justify-content: space-around;">
				<div class="col-6">
					<form action="/event/newTask/<?php echo $event; ?>/photo" method="post">
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
						
						<?php
						if($type->datefin == 1){
							?>
						<div class="form-group">
							<label>Date de fin :</label>
							<br>
							<input type="date" name="datefin">
							<br>
							<br>
						</div>
						<?php } ?>
						
						<?php
						$i = 0;
						while($i < $type->texte){
							?>
						<div class="form-group">
							<label>Texte <?php echo $i+1 ?> :</label>
							<br>
							<input type="text" placeholder="Text" name="text<?php echo $i?>">
							<br>
							<br>
						</div>
						<?php $i++; }?>

				</div>
				<div class="col-6">
					<div class="card md-3">
						<div class="card-header">
							<h2>Participants</h2>
						</div>
						<div class="card-body">
							<?php
							$i = 0;
							$participants = App\Http\Controllers\ControllerParticipants::getParticipants($event);
								foreach($participants as $participant){
									echo "<li class='list-group-item'><input type='checkbox' name='participants[]' value=$participant->utilisateur_id>".$participant->pseudo."</li></a>";
									$i++;
								}

							?>
						</div>
					</div>
				</div>
			</div>
			
			<div class='col-12'>
			<?php 
			$i = 0;
			while($i < $type->photo){
				echo'
				<fieldset>
				  <p>
					<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer l\'image :</label>
					<input name="fichier" type="file" id="fichier_a_uploader" name="photo'.$i.'" />
				  </p>
				</fieldset>
				';
				$i++;
			}
			?>
			
						
			<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo " $event "; ?>';" value="Retour" />
			<input type="submit" id="creer" class="btn btn-primary" value="Creer">
			<?php echo csrf_field(); ?>
			</div>

			
			</form>
		</div>
	</div>
</div>
</div>
</div>

<?php include("footer.php");?>
