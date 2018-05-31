<?php include("header.php");
        use App\Http\Controllers\ControllerParticipants;
        use App\Http\Controllers\ControllerTache;
 ?>

  <div class="col-2">
	<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/task/".$id_task."'\"" ; ?> value="Retour" />
</div>

	<div id="content" class="container">
		<div class="row">
			<h1>Gérer les participants</h1>
		</div>
		
		<div class="row">
			<div class="col-4">
				<label>Participants à la tâche</label> 
			</div>
			<div class="col-4">
				<label>Participants à l'événement</label> 
			</div>
		</div>
		<div class="row">
			<div id="participants" class="col-4">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
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

			<div id="utilisateurs" class="col-4">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
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
	<div>
	
<?php include("footer.php"); ?>
