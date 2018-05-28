<?php include("header.php"); ?>
	<div class="d-flex justify-content-center align-items-center container">
		<div class="col-10">

		<div class="card mb-3">
			<div class="card-header">
				<h1>Inscription</h1>
			</div>

			<div class="card-body">
				<form action="inscription" method="post">

	        		<?php if(Session::has('erreurInscription')){
							echo "<div class='alert alert-danger' role='alert'>
							".Session::get('erreurInscription')."</div>";
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
								<td><input type="mail" placeholder="Email" class="form-control" name="mail" required></td>
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
					
					<?php echo csrf_field(); ?>
					<input type="submit" id="register" class="btn btn-primary" value="Inscription">
				</form>
			</div>
		</div>
		</div>
	</div>
<?php include("footer.php");?>