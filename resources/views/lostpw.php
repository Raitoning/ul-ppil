<?php
	include 'header.php';
?>
	<div class="container">
		<div class="row">
			<h1>Mot de passe oublié</h1>
		</div>
		<div id="login" class="row">
			<form>
				<div class="form-group">
					<label for="mail">Email:</label>
					<input type="text" class="form-control" placeholder="Email" name="mail" required><br>
					<input type="submit" id="reinit" class="btn btn-primary" value="Réinitialiser mon mot de passe"><br>
				</div>
			</form>
		</div>
	</div>
<?php
	include 'footer.php';
?>