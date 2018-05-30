<?php
    include 'header.php';
	use App\Http\Controllers\ControllerParticipants;
?>

<div class="col-2">
	<input type="button" class="btn btn-primary" <?php echo "onclick=\"location.href='/event/".$event_id."'\"" ; ?> value="Retour" />

</div>

<br>

<div class="container justify-content-center d-flex">
	
	<div class="col-10">

		<div class="card md-6">

			<div class="card-header bg-info text-white">

		        <h5>Participants à l'évènement</h5>
			</div>

			<div class="card-body">
				<ul class="list-group">
					<?php	

						$utilisateurs = ControllerParticipants::getParticipants($event_id);
						
						if(ControllerParticipants::estProprio($event_id,Session::get('utilisateur')->utilisateur_id)) {

							foreach($utilisateurs as $util) {

								if($util->utilisateur_id != Session::get('utilisateur')->utilisateur_id) {

									echo "<form action='droits' method='post'>

										<li class='list-group-item list-group-item-action'>

											<div class='row'>

												<div class='col-auto'>

													".$util->pseudo."

												</div>
												
													<div class='col-auto'>
													
														<div class='form-check form-check-inline'>

															<label class='form-check-label'>
																<input class='form-check-input' type='radio' name='rights' value='proprietaire' ";
															if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "proprietaire") 
																echo "checked";
															echo "> Propriétaire<br>
															</label>
														</div>

														<div class='form-check form-check-inline'>

															<label class='form-check-label'>
																<input class='form-check-input' type='radio' name='rights' value='edition'";
															if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "edition") 
																echo "checked";
															echo "> Edition<br>
															</label>
														</div>

														<div class='form-check form-check-inline'>

															<label class='form-check-label'>
																<input class='form-check-input' type='radio' name='rights' value='aucun'"; 
															if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "aucun") 
																echo "checked";
															echo "> Aucun
															</label>
														</div>
													</div>

													<div class='col-auto'>

														<button type='submit' id='register' class='btn btn-success' value='Enregistrer les modifications'>Valider</button>
														".csrf_field()."
														<input type='button' class='btn btn-danger' onclick='location.href=\"".$event_id."/".$util->utilisateur_id."\";' value='Supprimer' />
													</div>
												</li>
											</div>

											<input type='hidden' name='id_event' value='".$event_id."'>
											<input type='hidden' name='id_user' value='".$util->utilisateur_id."'>
										</form>
									";
								}
							}
						} else {

							foreach($utilisateurs as $util){

								echo "<li class='list-group-item list-group-item-action'>".$util->pseudo."</li>";
							}
						}
					?>
				</ul>

				<?php
					$tmp = ControllerParticipants::getDroit($event_id,Session::get('utilisateur')->utilisateur_id);

					if($tmp == "proprietaire" || $tmp == "edition") {

						echo "<div class='col-auto'>
							<input type='button' class='btn btn-primary' onclick='location.href=\"".$event_id."/ajoutUtilisateurs\";' value='Envoyer des invitations' />
						</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>



<?php
    include 'footer.php';
?>