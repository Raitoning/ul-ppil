<?php include("header.php");
	use App\Http\Controllers\ControllerParticipants;
 ?>
	<div id="content" class="container">
		<div class="row">
			<h1>Gérer les contacts</h1>
		</div>
		<div class="row">
			<div class="col-4">
				<label>Participant</label> 
			</div>
			<div class="col-4">
				<label>Favoris</label> 
			</div>
			<div class="col-4">
				<label>Utilisateur</label> 
			</div>
		</div>
		<div class="row">
			<div id="participants" class="col-4">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
					<?php 
					$k = 0;
					$tmp = ControllerParticipants::getParticipants($event_id);
					foreach($tmp as $t){
						echo "<li class='list-group-item' id='any_user".$k."' >".$t->pseudo."</li>" ;
						$k++;
					}
					
					?>
				</ul>
				</div>
			</div>
		
			<div id="favoris" class="col-4">
				
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;">
				<ul id="fav_user_list" class="list-group" tabindex="0">
				<?php 
				use App\Http\Controllers\ControllerContacts;
				
				$i =0;
				$fav = ControllerParticipants::getFavoris($event_id);
				foreach($fav as $contact){
					echo "<a href='../ajouter/".$event_id."/".$contact->utilisateur_id."'><li class='list-group-item' id='fav_user".$i."' >".$contact->pseudo."</li></a>" ;
					$i++;
				}
				
				?>
				</ul>
				</div>
			</div>

			<div id="utilisateurs" class="col-4">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
					<?php 
					
					$j =0;
					$utils = ControllerParticipants::getUtilisateurs($event_id);
					foreach($utils as $util){
						echo "<a href='../ajouter/".$event_id."/".$util->utilisateur_id."'><li class='list-group-item' id='any_user".$j."' >".$util->pseudo."</li></a>" ;
						$j++;
					}
					
					?>
				</ul>
				</div>
			</div>
		</div>
	<div>
	
<?php include("footer.php"); ?>
