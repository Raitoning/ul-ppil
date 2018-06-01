<?php include 'header.php' ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Gérer les contacts</h5>
			</div>

			<div class="input-group float-right">

				<input class="form-control mx-1 mt-1" id="myInput" type="text" placeholder="Rechercher un utilisateur">
			</div>

			<div class="card-body">

				<div class="row justify-content-center">

					<div class="col">

						<div class="card md-3">

							<div class="card-header bg-info text-white">

								<h5 class="card-title">Favoris</h5>
							</div>

							<div class="card-body h-75" style="overflow:auto;">

								<ul id="fav_user_list" class="list-group" tabindex="0">
									<?php 
									$i =0;
									$fav = App\Http\Controllers\ControllerContacts::getFavoris();
									foreach($fav as $contact){
										echo "<a href='supprimerContact/".$contact."'><li class='list-group-item list-group-item-action mt-1' id='fav_user".$i."' >".$contact."</li></a>" ;
										$i++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="col">

						<div class="card md-3">

							<div class="card-header bg-info text-white">

								<h5 class="card-title">Utilisateurs</h5>
							</div>

							<div class="card-body h-75" style="overflow:auto;">

								<ul id="any_user_list" class="list-group" tabindex="0">
									<?php 
									$j =0;
									$utils = App\Http\Controllers\ControllerContacts::getUtilisateurs();
									foreach($utils as $util){
										echo "<a href='ajoutContact/".$util."'><li class='list-group-item list-group-item-action mt-1' id='any_user".$j."' >".$util."</li></a>" ;
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

<?php include 'footer.php' ?>
