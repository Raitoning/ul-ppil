<?php
	include('header.php');
?>
<div class="d-flex justify-content-center align-items-center container">
	<div class="col-10">
		<div class="card mb-3">
			<div class="card-header">
				<h1>Mot de passe oublié</h1>
			</div>
			<div id="login" class="card-body">
				<form>
					<div class="form-group">
						<label for="mail">Email:</label>
						<input type="email" class="form-control" placeholder="Email" name="mail" required><br>
						<input type="submit" id="reinit" class="btn btn-primary" value="Réinitialiser mon mot de passe"><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	include('footer.php');
?>