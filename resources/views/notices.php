<?php include("header.php"); ?>

<!-- TODO: Responsive -->

<div class="col-2">

	<input type="button" class="btn btn-primary" onclick="location.href='accueil'" value="Retour" />
</div>

<br>

<div class="content justify-content-center d-flex">

	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

				<h5>Notifications</h5>

			</div>

			<?php 
			use App\Http\Controllers\NotifController;
			foreach ($notices as $notice) {
				if($notice->action == "rejoindre" || ($notice->action == "ajout" && $notice->module == "evenement")){
					echo '
					<div class="card-body">
						
						<div class="alert alert-info alert-dismissible row">
							
							<a href="notices/supprimerNotif/'.$notice->notification_id.'" class="close" data-dismiss="alert" aria-label="close">&times;</a> <div class="col-9">'
								.NotifController::genererMessage($notice).' </div><div class="col-3">'
									.'<input type="button" class="btn btn-success" onclick="location.href=\'notices/accepterNotif/'.$notice->notification_id.'\'" value="Accepter" />'
									.'<input type="button" class="btn btn-danger" onclick="location.href=\'notices/refuserNotif/'.$notice->notification_id.'\'" value="Refuser" />
								</div> </div>'.
								
								'</div>	';
							}else {
								echo '
								<div class="card-body">
									
									<div class="alert alert-success alert-dismissible row">
										
										<a href="notices/supprimerNotif/'.$notice->notification_id.'" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
										.NotifController::genererMessage($notice).
										'</div>'.
										'</div>	';
									}
									
								}
								?>
		</div>
	</div>
</div>

<?php include("footer.php");?>