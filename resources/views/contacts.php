<?php include("header.php"); ?>
	<div id="content" class="container">
		<div class="row">
			<h1>Gérer les contacts</h1>
		</div>
		<div class="row">
			<div class="col-6">
				<label>Favoris</label> 
			</div>
			<div class="col-6">
				<label>Utilisateur</label> 
			</div>
		</div>
		<div class="row">
			<div id="favoris" class="col-6">
				
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;">
				<ul id="fav_user_list" class="list-group" tabindex="0">
				<?php 
				
				$i =0;
				$fav = App\Http\Controllers\ControllerContacts::getFavoris();
				foreach($fav as $contact){
					echo "<li class='list-group-item'> id='fav_user".$i."' >".$contact."</li>" ;
					$i++;
				}
				
				?>
				</ul>
				</div>
			</div>

			<div id="utilisateurs" class="col-6">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
					<?php 
					
					$j =0;
					$utils = App\Http\Controllers\ControllerContacts::getUtilisateurs();
					foreach($utils as $util){
						echo "<li class='list-group-item'> id='any_user".$j."' >".$util."</li>" ;
						$j++;
					}
					
					?>
				</ul>
				</div>
			</div>
		</div>

		<div id="sortedby" class="row">
			Trier par:
			<form action="">
				<input type="radio" name="sorted" value="alpha"> Alphabétique<br>
				<input type="radio" name="sorted" value="n_alpha"> Alphabétique Inverse<br>
				<input type="radio" name="sorted" value="signdate"> Date d'Inscription Croissante<br>
				<input type="radio" name="sorted" value="n_signdate"> Date d'Inscription Décroissante
			</form>
		</div>
	<div>
	
<?php include("footer.php"); ?>
