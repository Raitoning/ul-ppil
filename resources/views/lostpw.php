<?php
	include 'header.php';
?>
	
	<h1>Mot de passe oublié</h1>

	<div id="login">
		<form>
			<label for="mail">Email:</label>
			<input type="text" placeholder="Email" name="mail" required><br>
			<input type="submit" id="reinit" value="Réinitialiser mon mot de passe"><br>
		</form>
	</div>

<?php
	include 'footer.php';
?>