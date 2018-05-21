<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<h1>Inscription</h1>
		</div>

		<div id="content" class="row">
			<form action="inscription" method="post">

				<?php if(Session::has('erreurInscription')){
						echo "<p>".Session::get('erreurInscription')."</p>";
						Session::forget('erreurInscription');
					}
				?>

				<table>
					<div class="form-group">
						<tr>
							<td><label for="pseudo">Nom d'utilisateur:</label></td>
							<td><input type="text" placeholder="Pseudo" class="form-control" name="pseudo" required></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td><label for="mail">Email:</label></td>
							<td><input type="text" placeholder="Email" class="form-control" name="mail" required></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td><label for="mdp">Mot de passe:</label></td>
							<td><input type="password" id="mdp" class="form-control" placeholder="Mot de passe" name="mdp" required></td>
						</tr>
					</div>
					<div class="form-group">
						<tr>
							<td><label for="cmdp">Confirmer mot de passe:</label></td>
							<td><input type="password" id="cmdp" class="form-control" placeholder="Mot de passe" name="cmdp" required></td>
						</tr>
					</div>
				</table>
				<div class="row">
				<label class="form-check-label">
				    <input type="checkbox" id="checkconditions" name="conditions" value="vconditions" class="form-check-input">
				    <label for="conditions">J'accepte les <a href="#">Termes et conditions générales d'utilisation</a>.</label></br>
			    </label>
				</div>
				
				<?php echo csrf_field(); ?>
				<input type="submit" id="register" class="btn btn-primary" value="Inscription"><a href="#"> En savoir plus ?</a>
			</form>
		</div>
	</div>
<?php include("footer.php");?>