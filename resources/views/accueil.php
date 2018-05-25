<?php
    include 'header.php';
?>

<div class="container">
	<div class="row">
		<!--<div id="content">-->
			<div class="col-6">
				<div class="card md-3">
					<div class="card-header">
						Menu
					</div>
					<div class="card-body">
				    	<div id="user_actions">
					        <div class="row">
					        	<a href="newEvent">Créer un nouvel événement</a><br>
					        </div>
					        <div class="row">
					        	<a href="events">Evènements</a><br>
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
					    </div>
					</div>
				</div>
			</div>

		    <div class="col-6">
		    	<div class="card md-3">
		    		<div class="card-header">
						Evenements à venir
					</div>
					<div class="card-body">
					    <div id="user_lists">
							<?php
								use App\Http\Controllers\ControllerEvenement;
								$liste = ControllerEvenement::getUserEvents();
								
								foreach($liste as $affichage){
									echo "
										<p>".$affichage->intitule."</p>
										<p>Date de début :".$affichage->dateDebut."</p>
										<br>
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
