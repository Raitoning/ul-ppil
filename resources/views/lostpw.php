<?php
	include('header.php');
?>

<div class="col-2">
	<input type="button" class="btn btn-primary" onclick="location.href='/login'" value="Retour" />
</div>

<br>

<div class="d-flex justify-content-center container">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Mot de passe oublié</h5>
			</div>

			<div class="card-body">
			
				<form>

					<div class="form-group">

						<label for="mail">Email:</label>
						<input type="email" class="form-control" placeholder="Email" name="mail" required>
					</div>

					<input type="submit" id="reinit" class="btn btn-primary" value="Envoyer">
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include('footer.php');
?>