<?php
    include 'header.php';
?>

<div class="container">
	<div class="row">
		<!--<div id="content">-->
			<div class="col-6">
				<div class="card md-3">
					<div class="card-header">
						<h1>Menu</h1>
					</div>
					<div class="card-body">
				    	<div id="user_actions">
					        <div class="row">
					        	<a href="newEvent">Créer un nouvel événement</a><br>
					        </div>
					        <div class="row">
					        	<a href="events">Événements</a><br>
					        </div>
					        <div class="row">
					        	<a href="contacts">Contacts</a><br>
					        </div>
					        <div class="row">
					        	<a href="account">Options du compte</a><br>
					        </div>
					        <div class="row">
					        	<a href="notices">Notifications</a><br>
					    	</div>
							<div class="row">
					        	<a href="ajoutTypeTache">Créer un type de tâche</a><br>
					    	</div>
					    </div>
					</div>
				</div>
			</div>

		    <div class="col-6">
		    	<div class="card md-3">
		    		<div class="card-header">
						<h1>Événements à venir</h1>
					</div>
					<div class="card-body">
					    <div id="user_lists">
							<?php
								use App\Http\Controllers\ControllerEvenement;
								$liste = ControllerEvenement::getUserEvents();
								
								foreach($liste as $affichage){
									echo "
										<div class='card md-3' style='margin-bottom : 5px;'>
											<div class='card-header'>
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
</div>
<?php
    include 'footer.php';
?>
