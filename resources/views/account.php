<?php
	include 'header.php';
?>
	<h1>Gestion du Compte</h1>
	<div id="content">
		<form>
			<table>
				<tr><td><label for="pseudo">Nom d'utilisateur:</label></td><td><input type="text" placeholder="Pseudo" name="pseudo" required></td></tr>
				<tr><td><label for="mdp">Mot de passe:</label></td><td><input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required></td></tr>
				<tr><td><label for="cmdp">Confirmation:</label></td><td><input type="password" id="cmdp" placeholder="Mot de passe" name="cmdp" required></td></tr>
				<tr><td><label for="mail">Email:</label></td><td><input type="text" placeholder="Email" name="mail" required></td></tr>
			</table>

			Recevoir les invitations <br>
			<input type="radio" id="radioamis" name="amis" value="vamis">
			<label for="radioamis"> Amis</label>
			<input type="radio" id="radiotous" name="tous" value="vtous">
			<label for="radiotous"> Tout le monde</label>
			<input type="radio" id="radionone" name="none" value="vnone">
			<label for="radionone"> Personne</label><br>

			Reception d'email pour chaque notification <br>
			<input type="radio" id="notifyes" name="nyes" value="vyes">
			<label for="notifyes"> Oui</label>
			<input type="radio" id="notifno" name="nno" value="vno">
			<label for="notifno"> Non</label><br>
			<input type="submit" id="register" value="Appliquer"><br>
		</form>

		<div id="delete">
			<form>
				<input type="submit" id="suppracc" value="Supprimer Compte">
			</form>
		</div>
	</div>

<?php
	include 'footer.php';
?>