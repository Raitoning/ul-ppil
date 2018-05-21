<?php
    include 'header.php';
?>

<div class="container">
	<div class="row">
		<!--<div id="content">-->
			<div class="col-6">
				<div class="row">
					<a href="contacts">Contacts</a><br>
				</div>

				<div class="row">
					<a>Evènements</a><br>
				</div>

				<div class="row">
					<a href="account">Options du compte</a><br>
				</div>

				<div class="row">
					<a>Notifications</a><br>
				</div>
			</div>

		    <div class="col-6">
			    <div id="user_lists">
				    <p>Evenements à venir</p>
					<?php
						//TODO: affichage evenement
						/*use App\Http\Controllers\ControllerConnexion;
						$event = ControllerConnexion::getEventUtil();
						echo $event->first();
						foreach($event as $temp){
							echo $temp;
						}*/
					?>
				</div>
		    </div>
	    <!--</div>-->
	</div>
</div>
<?php
    include 'footer.php';
?>