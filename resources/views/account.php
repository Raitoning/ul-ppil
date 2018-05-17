<div class="body"></div>
<div id="container">
	<h1>Gestion du Compte</h1>
<div class="contents">
	<form>
		<div class="account" style="background-color:lightblue">
			Nom d'utilisateur: <input type="text" placeholder="Pseudo" name="pseudo" required><br>
			
			Mot de passe: <input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required><br>
			Confirmation: <input type="password" id="cmdp" placeholder="Mot de passe" name="cmdp" required><br>
			Email: <input type="text" placeholder="Email" name="mail" required><br>
			<div style="background-color:lightgreen"><br>
			Recevoir les invitations <br>
			<input type="checkbox" id="boxamis" name="amis" value="vamis">
			<label for="boxamis"> Amis</label>
			<input type="checkbox" id="boxtous" name="tous" value="vtous">
			<label for="boxtous"> Tout le monde</label>
			<input type="checkbox" id="boxnone" name="none" value="vnone">
			<label for="boxnone"> Personne</label><br>

			Reception d'email pour chaque notification <br>
			<input type="checkbox" id="notifyes" name="nyes" value="vyes">
			<label for="notifyes"> Oui</label>
			<input type="checkbox" id="notifno" name="nno" value="vno">
			<label for="notifno"> Non</label><br>
			</div>
			<input type="submit" id="register" value="Appliquer"><br>
		</div>
	</form>
	<form>
		<div class="delete">
			<input type="submit" id="suppracc" value="Supprimer Compte">
		</div>
	</form>
</div>
	
</div>