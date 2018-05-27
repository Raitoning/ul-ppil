<?php
    include 'header.php';
	use App\Http\Controllers\ControllerParticipants;
?>

<div class="d-flex justify-content-center align-items-center container">
	<div class="col-10">
		<div class="card md-3">
			<div class="card-header">
		        <h1>Participants à l'évènement</h1>
			</div>
			<div class="card-body">
		        <ul>
				<?php			
					$utilisateurs = ControllerParticipants::getParticipants($event_id);
					
					
					if(ControllerParticipants::estProprio($event_id,Session::get('utilisateur')->utilisateur_id)){
						foreach($utilisateurs as $util){
							echo "
							<form action='droits' method='post'>
							<li>".$util->pseudo."
							
							<div style='display : flex; justify-content : space-between;'>
								<div id='choix'>
									<label class='radio-inline'>
										<input type='radio' name='rights' value='proprietaire' ";
									if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "proprietaire") 
										echo "checked";
									echo "> Propriétaire<br>
									</label>
									<label class='radio-inline'>
										<input type='radio' name='rights' value='edition'";
									if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "edition") 
										echo "checked";
									echo "> Edition<br>
									</label>
									<label class='radio-inline'>
										<input type='radio' name='rights' value='aucun'"; 
									if(ControllerParticipants::getDroit($event_id,$util->utilisateur_id) == "aucun") 
										echo "checked";
									echo "> Aucun
									</label>
								</div>
								<div id='validation'>
									<label class='radio-inline'>
									<button type='submit' id='register' class='btn btn-success' value='Enregistrer les modifications'>Valider</button>
									</label>
									".csrf_field()."
									<input type='button' class='btn btn-danger' onclick='location.href=\"".$event_id."/".$util->utilisateur_id."\";' value='Supprimer' />
									</li>

							<input type='hidden' name='id_event' value='".$event_id."'>
							<input type='hidden' name='id_user' value='".$util->utilisateur_id."'>
							</form>
							";
						}
					}
					else{
						foreach($utilisateurs as $util){
							echo "
							<li>".$util->pseudo."</li>
							";
						}
					}

					$tmp = ControllerParticipants::getDroit($event_id,Session::get('utilisateur')->utilisateur_id);
					if($tmp == "proprietaire" || $tmp == "edition"){
						echo "<input type='button' class='btn btn-info' onclick='location.href=\"".$event_id."/ajoutUtilisateurs\";' value='Envoyer des invitations' />";
					}
				?>
		        </ul>

		    </div>
		</div>
	</div>
</div>



<?php
    include 'footer.php';
?>