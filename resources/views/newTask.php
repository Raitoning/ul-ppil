<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
use App\Http\Controllers\ControllerTypeTache;
use App\Http\Controllers\ControllerParticipants;
$utilisateur = Session::get('utilisateur')->utilisateur_id;
Session::put('typeTache',$type);
?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/event/<?php echo " $event "; ?>';" value="Retour" />

</div>

<br>

<div class="d-flex justify-content-center container">

	<div class="col-10">
		<div class="card mb-6">
			<div class="card-header bg-info text-white">

				<h5>Creer une tâche:</h5>
			</div>

			<div class="card-body">

				<div class="row">

					<div class="col-md-6">

						<form enctype="multipart/form-data" action="/event/newTask/<?php echo $event; ?>/photo" method="post">

							<div class="form-group">

								<label>Nom de la tâche:</label>
								<input class="form-control" type="text" placeholder="Nom de la tâche" name="task">
							</div>

							<div class="form-group">

								<label>Description:</label>
								<input class="form-control" type="text" placeholder="Description" name="desc">
							</div>

							<div class="form-group">

								<label>Quantité:</label>
								<input class="form-control" type="text" placeholder="Quantité" name="quantity">
							</div>
							
							<?php
								if($type->datefin == 1){
									?>
								<div class="form-group">

									<label>Date de fin :</label>
									<input class="form-control" type="date" name="datefin">
								</div>
							<?php } ?>
							
							<?php

								$i = 0;
								while($i < $type->texte){
									?>
								<div class="form-group">

									<label>Texte <?php echo $i+1 ?> :</label>
									<input class="form-control" type="text" placeholder="Text" name="text<?php echo $i?>">
								</div>

							<?php 
								$i++; }
							?>

					</div>

					<div class="col-md-6">

						<div class="card md-3">

							<div class="card-header bg-info text-white">

								<h5>Participants</h5>
							</div>

							<div class="card-body">
								<ul class="list-group">
									<?php
									$i = 0;
									$participants = App\Http\Controllers\ControllerParticipants::getParticipants($event);
										foreach($participants as $participant){
											echo "<li class='list-group-item'><input type='checkbox' name='participants[]' value=$participant->utilisateur_id>".$participant->pseudo."</li></a>";
											$i++;
										}

									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class='col-12'>
					<?php 
					$i = 0;
					while($i < $type->photo){
						echo'
						<p>
							<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer l\'image :</label>
							<input type="file" name="photo'.$i.'" multiple/>
						</p>
						';
						$i++;
					}
					?>

				<input type="submit" id="creer" class="btn btn-primary mt-1" value="Creer">
				<?php echo csrf_field(); ?>
				</div>

			
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php include("footer.php");?>
