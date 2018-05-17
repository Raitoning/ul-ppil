
<?php include("header.php"); ?>

<div class="body"></div>
<div id="container">
	<h1>Inscription</h1>
	<div class="contents">
	<form>
		<div class="register" style="background-color:lightblue">
			*Nom d'utilisateur: <input type="text" placeholder="Pseudo" name="pseudo" required><br>
			*Email: <input type="text" placeholder="Email" name="mail" required><br>
			*Mot de passe: <input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required><br>
			*Confirmer mot de passe: <input type="password" id="cmdp" placeholder="Mot de passe" name="cmdp" required><br>
			*Champ Obligatoire.<br>

			<input type="checkbox" id="checkconditions" name="conditions" value="vconditions">
			<label for="checkconditions">J'accepte les <a href="#">Termes et conditions generales d'utilisation</a>.</label><br>

			<input type="submit" id="register" value="Inscription"><a href="#"> En savoir plus ?</a><br>
		</div>
	</form>
	</div>
	
</div>

<?php include("footer.php");?>