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
					<li id="fav_user_1" class="list-group-item">Favori 1</li>
					<li id="fav_user_2" class="list-group-item">Favori 2</li>
					<li id="fav_user_3" class="list-group-item">Favori 3</li>
					<li id="fav_user_4" class="list-group-item">Favori 4</li>
					<li id="fav_user_5" class="list-group-item">Favori 5</li>
					<li id="fav_user_6" class="list-group-item">Favori 6</li>
					<li id="fav_user_7" class="list-group-item">Favori 7</li>
					<li id="fav_user_8" class="list-group-item">Favori 8</li>
					<li id="fav_user_9" class="list-group-item">Favori 9</li>
					<li id="fav_user_10" class="list-group-item">Favori 10</li>
					<li id="fav_user_11" class="list-group-item">Favori 11</li>
					<li id="fav_user_12" class="list-group-item">Favori 12</li>
					<li id="fav_user_13" class="list-group-item">Favori 13</li>
					<li id="fav_user_14" class="list-group-item">Favori 14</li>
					<li id="fav_user_15" class="list-group-item">Favori 15</li>
					<li id="fav_user_16" class="list-group-item">Favori 16</li>
					<li id="fav_user_17" class="list-group-item">Favori 17</li>
					<li id="fav_user_18" class="list-group-item">Favori 18</li>
					<li id="fav_user_19" class="list-group-item">Favori 19</li>
					<li id="fav_user_20" class="list-group-item">Favori 20</li>
					<li id="fav_user_21" class="list-group-item">Favori 21</li>
					<li id="fav_user_22" class="list-group-item">Favori 22</li>
					<li id="fav_user_23" class="list-group-item">Favori 13</li>
					<li id="fav_user_24" class="list-group-item">Favori 24</li>
					<li id="fav_user_25" class="list-group-item">Favori 25</li>
					<li id="fav_user_26" class="list-group-item">Favori 26</li>
					<li id="fav_user_27" class="list-group-item">Favori 27</li>
					<li id="fav_user_28" class="list-group-item">Favori 28</li>
					<li id="fav_user_29" class="list-group-item">Favori 29</li>
				</ul>
				</div>
			</div>

			<div id="utilisateurs" class="col-6">
				<div class="w-50 p-3 h-75 d-inline-block" style="overflow:auto;>
				<ul id="any_user_list" class="list-group" tabindex="0">
					<li id="any_user_1" class="list-group-item">Utilisateur 1</li>
					<li id="any_user_2" class="list-group-item">Utilisateur 2</li>
					<li id="any_user_3" class="list-group-item">Utilisateur 3</li>
					<li id="any_user_4" class="list-group-item">Utilisateur 4</li>
					<li id="any_user_5" class="list-group-item">Utilisateur 5</li>
					<li id="any_user_6" class="list-group-item">Utilisateur 6</li>
					<li id="any_user_7" class="list-group-item">Utilisateur 7</li>
					<li id="any_user_8" class="list-group-item">Utilisateur 8</li>
					<li id="any_user_9" class="list-group-item">Utilisateur 9</li>
					<li id="any_user_10" class="list-group-item">Utilisateur 10</li>
					<li id="any_user_11" class="list-group-item">Utilisateur 11</li>
					<li id="any_user_12" class="list-group-item">Utilisateur 12</li>
					<li id="any_user_13" class="list-group-item">Utilisateur 13</li>
					<li id="any_user_14" class="list-group-item">Utilisateur 14</li>
					<li id="any_user_15" class="list-group-item">Utilisateur 15</li>
					<li id="any_user_16" class="list-group-item">Utilisateur 16</li>
					<li id="any_user_17" class="list-group-item">Utilisateur 17</li>
					<li id="any_user_18" class="list-group-item">Utilisateur 18</li>
					<li id="any_user_19" class="list-group-item">Utilisateur 19</li>
					<li id="any_user_20" class="list-group-item">Utilisateur 20</li>
					<li id="any_user_21" class="list-group-item">Utilisateur 21</li>
					<li id="any_user_22" class="list-group-item">Utilisateur 22</li>
					<li id="any_user_23" class="list-group-item">Utilisateur 23</li>
					<li id="any_user_24" class="list-group-item">Utilisateur 24</li>
					<li id="any_user_25" class="list-group-item">Utilisateur 25</li>
					<li id="any_user_26" class="list-group-item">Utilisateur 26</li>
					<li id="any_user_27" class="list-group-item">Utilisateur 27</li>
					<li id="any_user_28" class="list-group-item">Utilisateur 28</li>
					<li id="any_user_29" class="list-group-item">Utilisateur 29</li>
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
