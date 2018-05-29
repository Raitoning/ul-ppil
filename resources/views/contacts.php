<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

	<div class="container">
		<div class="card md-3">
			<div class="card-header">
			<div class="col-8">
				<h1>Gérer les contacts</h1>
				</div>
				<div class="input-group float-right ">
					<input class="form-control" id="myInput" type="text" placeholder="Rechercher un utilisateur">
				</div>
			</div>
			<div class="card-body row">
				<div class="col-6">
					<div class="card md-3">
						<div class="card-header">
							<label>Favoris</label>
						</div>
						<div class="card-body">
							<div class="w-100 p-3 h-75 d-inline-block text-center" style="overflow:auto;">
								<ul id="fav_user_list" class="list-group" tabindex="0">
									<?php 
										$i =0;
										$fav = App\Http\Controllers\ControllerContacts::getFavoris();
										foreach($fav as $contact){
											echo "<a href='supprimerContact/".$contact."'><li class='list-group-item list-group-item-action' id='fav_user".$i."' >".$contact."</li></a>" ;
											$i++;
										}
									?>
								</ul>
							</div>
						</div> 
					</div>
				</div>
				<div class="col-6">
					<div class="card md-3">
						<div class="card-header">
							<label>Utilisateurs</label>
						</div>
						<div class="card-body">
							<div id="utilisateurs">
								<div class="w-100 p-3 h-75 d-inline-block text-center" style="overflow:auto;">
									<ul id="any_user_list" class="list-group" tabindex="0">
										<?php 
											$j =0;
											$utils = App\Http\Controllers\ControllerContacts::getUtilisateurs();
											foreach($utils as $util){
												echo "<a href='ajoutContact/".$util."'><li class='list-group-item list-group-item-action' id='any_user".$j."' >".$util."</li></a>" ;
												$j++;
											}
										?>
									</ul>
								</div>
							</div> 
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#any_user_list li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#fav_user_list li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php include("footer.php"); ?>
