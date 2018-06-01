<?php include("header.php");
	use App\Http\Controllers\ControllerParticipants;
 ?>

  <div class="col-2">
	<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/participants/".$event_id."'\"" ; ?> value="Retour" />
</div>

<div class="container justify-content-center d-flex">
	
	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

		        <h5>Inviter de nouveaux participants</h5>
			</div>
			
			<div class="input-group float-right">

				<input class="form-control mx-1 mt-1" id="myInput" type="text" placeholder="Rechercher un utilisateur">
			</div>
		
			<br>
			
		<div class="row mx-1">
		
					<div class="col">

						<div class="card md-3 my-1">

							<div class="card-header bg-success text-white">

								<h5 class="card-title">Participants</h5>
							</div>

							<div id="participants" class="mt-1">
								<div class="h-100" style="overflow:auto;">
									<ul id="any_user_list" class="list-group" tabindex="0">
										<?php 
											$k = 0;
											$tmp = ControllerParticipants::getParticipants($event_id);
											foreach($tmp as $t){
												echo "<li class='list-group-item mx-1 mt-1 border-success' id='any_user".$k."' >".$t->pseudo."</li>" ;
												$k++;
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
		
					<div class="col">

						<div class="card md-3 my-1">

							<div class="card-header bg-warning text-white">

								<h5 class="card-title">Favoris</h5>
							</div>

							<div id="favoris" class="mt-1">
								<div class="h-100" style="overflow:auto;">
								
									<ul id="fav_user_list" class="list-group" tabindex="0">
										<?php 
											use App\Http\Controllers\ControllerContacts;
				
											$i =0;
											$fav = ControllerParticipants::getFavoris($event_id);
											foreach($fav as $contact){
												echo "<a href='../ajouter/".$event_id."/".$contact->utilisateur_id."'><li class='list-group-item mx-1 mt-1 border-warning' id='fav_user".$i."' >".$contact->pseudo."</li></a>" ;
												$i++;
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>

			<div class="col">

				<div class="card md-3 my-1">

					<div class="card-header bg-info text-white">
					
						<h5 class="card-title">Utilisateurs</h5>
						
					</div>
					
					<div id="utilisateurs" class="mt-1">
						<div class="h-100" style="overflow:auto;">
							<ul id="any_user_list" class="list-group" tabindex="0">
											<?php 
					
											$j =0;
											$utils = ControllerParticipants::getUtilisateurs($event_id);
											foreach($utils as $util){
												echo "<a href='../ajouter/".$event_id."/".$util->utilisateur_id."'><li class='list-group-item mx-1 mt-1 border-info' id='any_user".$j."' >".$util->pseudo."</li></a>" ;
												$j++;
											}
					
											?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script>
	$(document).ready(function () {
		$("#myInput").on("keyup", function () {
			var value = $(this).val().toLowerCase();
			$("#any_user_list li").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#myInput").on("keyup", function () {
			var value = $(this).val().toLowerCase();
			$("#fav_user_list li").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
	
<?php include("footer.php"); ?>
