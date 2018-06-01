<?php include("header.php");
        use App\Http\Controllers\ControllerParticipants;
        use App\Http\Controllers\ControllerTache;
 ?>

<div class="col-2">

	<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/task/".$id_task."'\"" ; ?> value="Retour" />
</div>

<br>

<div class="container">

	<div class="card md-6">

		<div class="card-header bg-info text-white">

			<h5>Gérer les participants</h5>
		</div>
	
	<div class="card-body">

		<div class="row">

			<div class="col-md-6">

				<div class="card md-3">

					<div class="card-header bg-info text-white">

						<h5>Participants à la tâche</h5> 
					</div>

					<div class="card-body">

						<ul class="list-group" tabindex="0">
							<?php 
								$k = 0;
								$tmp = ControllerTache::getParticipants($id_task);
								foreach($tmp as $t){
									echo "<li class='list-group-item' id='any_user".$k."' >".$t->pseudo."</li>" ;
									$k++;
								}
							?>
						</ul>
					</div>
				</div>
			</div>


			<div class="col-md-6">

				<div class="card md-3">

					<div class="card-header bg-info text-white">

						<h5>Participants à l'événement</h5> 
					</div>

					<div class="card-body">

						<ul class="list-group" tabindex="0">
							<?php 
								$event = ControllerTache::getEvent($id_task);
								
								$j =0;
								$utils = ControllerTache::getUserEvent($event->evenement_id, $id_task);
								foreach($utils as $util){
									echo "<a href='../ajouter/".$id_task."/".$util->utilisateur_id."'><li class='list-group-item' id='any_user".$j."' >".$util->pseudo."</li></a>" ;
									$j++;
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<div>
	
<?php include("footer.php"); ?>
