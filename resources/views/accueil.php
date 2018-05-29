<?php include 'header.php'; ?>

<div class="content justify-content-center d-flex">

	<div class="row justify-content-center">

		<div class="col-md-6">

			<div class="card md-6">

				<div class="card-header bg-info text-white">

					<h5>Bienvenue
						<?php echo Session::get('utilisateur')->pseudo; ?>
					</h5>
				</div>

				<div class="card-body">

					<h5 class="card-title">Menu principal</h5>

					<a class="card-link" href="newEvent">Créer un nouvel évènement</a>
					<br>
					<a class="card-link" href="events">Évènements</a>
					<br>
					<a class="card-link" href="contacts">Contacts</a>
					<br>
					<a class="card-link" href="account">Options du compte</a>
					<br>
					<a class="card-link" href="notices">Notifications</a>
					<br>
					<a class="card-link" href="ajoutTypeTache">Creer type tache</a>
					<br>
				</div>
			</div>
		</div>

		<div class="col-md-6">

			<div class="card md-6">

				<div class="card-header bg-info text-white">

					<h5>Évènements à venir</h5>
				</div>

				<div class="card-body">

					<?php
							use App\Http\Controllers\ControllerEvenement;
							$liste = ControllerEvenement::getUserEvents();
							
							foreach($liste as $affichage){
								echo "
								<div class='card md-3'>
		
									<div class='card-header bg-secondary text-white'>
										
										".$affichage->intitule."
									</div>
								
									<div class='card-body'>
										
										<p>Date de début: ".$affichage->dateDebut."</p>
									</div>
							</div>
							";
						}
						?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>