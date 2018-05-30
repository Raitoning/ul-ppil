<?php
include 'header.php';
$utilisateur = Session::get('utilisateur')->utilisateur_id;
?>

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

					<a class="card-link" href="newEvent">Créer un nouvel événement</a>
					<br>
					<a class="card-link" href="events">Événements</a>
					<br>
					<a class="card-link" href="contacts">Contacts</a>
					<br>
					<a class="card-link" href="account">Options du compte</a>
					<br>
					<?php
					use App\Http\Controllers\NotifController;
					$vu = NotifController::ifVuNotif($utilisateur);
					if ($vu>0) {
						echo "<a class='card-link' href='notices'>Notifications <span class='badge badge-danger'>$vu</span></a>";
					}
						else {
							echo "<a class='card-link' href='notices'>Notifications</a>";
					 }?>



					<br>
		        	<a href="taskType">Mes types de tâche</a>
					<br>
				</div>
			</div>
		</div>

		<div class="col-md-6">

			<div class="card md-6">

				<div class="card-header bg-info text-white">

					<h5>Événements à venir</h5>
				</div>

				<div class="card-body">

					<?php
							use App\Http\Controllers\ControllerEvenement;
							$liste = ControllerEvenement::getPlannedUserEvents();

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
