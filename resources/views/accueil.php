<?php
    include 'header.php';
?>

<div class="container">
	<div class="row">
		<!--<div id="content">-->
			<div class="col-6">
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

		    <div class="col-6">
			    <div id="user_lists">
				    <p>Evenements à venir</p>
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
	    <!--</div>-->
	</div>
</div>
<?php
    include 'footer.php';
?>
