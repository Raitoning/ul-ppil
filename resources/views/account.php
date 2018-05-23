<?php
	include 'header.php';
?>
<div class="container">
	<h1>Gestion du Compte</h1>
	<div id="content">
		<?php if(Session::has('erreurUpdate')){
			echo "<p>".Session::get('erreurUpdate')."</p>";
			Session::forget('erreurUpdate');
		}?>
		<form action="" method="post">
			<table>
				<tr>
					<td><label for="pseudo">Nom d'utilisateur:</label></td>
					<td><input type="text" placeholder="Pseudo" name="pseudo" class="form-control" value=<?php echo Session::get('utilisateur')->pseudo; ?> required></td>
				</tr>
				<tr>
					<td><label for="mail">Email:</label></td>
					<td><input type="email" placeholder="Email" name="mail" class="form-control" value=<?php echo Session::get('utilisateur')->mail; ?> required></td>
				</tr>
				<tr>
					<td><label for="mdp">*Nouveau mot de passe:</label></td>
					<td><input type="password" id="mdp" placeholder="Mot de passe" class="form-control" name="mdp"></td>
				</tr>
				<tr>
					<td><label for="cmdp">*Confirmation:</label></td>
					<td><input type="password" id="cmdp" placeholder="Mot de passe" class="form-control" name="cmdp"></td>
				</tr>

			</table>
			<p style="font-size: 12px">*Laisser vide si vous ne voulez pas changer de mot de passe</p>

			<?php echo csrf_field(); ?>
			
			Recevoir les invitations <br>
			<input type="radio" id="radioamis" name="invitations" value="amis" <?php if(Session::get('utilisateur')->recevoirInvitation == "amis")echo "checked"; ?>>
			<label for="radioamis"> Amis</label>
			<input type="radio" id="radiotous" name="invitations" value="tous" <?php if(Session::get('utilisateur')->recevoirInvitation == "tous")echo "checked"; ?>>
			<label for="radiotous"> Tout le monde</label>
			<input type="radio" id="radionone" name="invitations" value="aucun" <?php if(Session::get('utilisateur')->recevoirInvitation == "aucun")echo "checked"; ?>>
			<label for="radionone"> Personne</label><br>

			Reception d'email pour chaque notification <br>
			<input type="radio" id="notifyes" name="notif" value="oui" <?php if(Session::get('utilisateur')->recevoirNotif == "oui")echo "checked"; ?>>
			<label for="notifyes"> Oui</label>
			<input type="radio" id="notifno" name="notif" value="non" <?php if(Session::get('utilisateur')->recevoirNotif == "non")echo "checked"; ?>>
			<label for="notifno"> Non</label><br>
			<input type="submit" id="register" class="btn btn-primary" value="Appliquer"><br>
		</form>

		<div id="delete">
			<form method="post" action="supprimerCompte" onsubmit="if(confirm('Etes vous sur de vouloir supprimer votre compte?')) return true; else return false;">
				<input type="submit" id="suppracc" class="btn btn-primary" value="Supprimer Compte">
				<?php echo csrf_field(); ?>
			</form>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>