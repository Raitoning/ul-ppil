<?php include("header.php"); ?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

	<div class="container">
		<div class="card md-3">
			<div class="card-header">
				<h1>Gérer les contacts</h1>
			</div>
			<div class="card-body row">
				<div class="col-6">
					<div class="card md-3">
						<div class="card-header">
							<label>Favoris</label>
						</div>
						<div class="card-body">
							<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;">
								<ul id="fav_user_list" class="list-group" tabindex="0">
									<?php 
									
									$i =0;
									$fav = App\Http\Controllers\ControllerContacts::getFavoris();
									foreach($fav as $contact){
										echo "<a href='supprimerContact/".$contact."'><li class='list-group-item' id='fav_user".$i."' >".$contact."</li></a>" ;
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
							<div id="utilisateurs" class="col-6">
								<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
								<ul id="any_user_list" class="list-group" tabindex="0">
									<?php 
									
									$j =0;
									$utils = App\Http\Controllers\ControllerContacts::getUtilisateurs();
									foreach($utils as $util){
										echo "<a href='ajoutContact/".$util."'><li class='list-group-item' id='any_user".$j."' >".$util."</li></a>" ;
										$j++;
									}
									
									?>
								</ul>
							</div>
						</div> 
					</div>
				</div>
				<br>
				<div class="card md-3" style="justify-content: center;">
					<div class="card-header">
						Trier par:
					</div>
					<div class="card-body">
						<form action="">
							<input type="radio" name="sorted" value="alpha"> Alphabétique<br>
							<input type="radio" name="sorted" value="n_alpha"> Alphabétique Inverse<br>
							<input type="radio" name="sorted" value="signdate"> Date d'Inscription Croissante<br>
							<input type="radio" name="sorted" value="n_signdate"> Date d'Inscription Décroissante
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include("footer.php"); ?>
