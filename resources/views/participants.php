<?php
    include 'header.php';
	use App\Http\Controllers\ControllerParticipants;
?>

    <div class='container'>
        <h1>Participants à l'évènement</h1>

        <ul>
		<?php

			
			$utilisateurs = ControllerParticipants::getParticipants($event_id);
			if(ControllerParticipants::estProprio($event_id,Session::get('utilisateur')->utilisateur_id)){
				foreach($utilisateurs as $util){
					echo "
					<form action='droits' method='post'>
					<li>".$util->pseudo."
					

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
					<label class='radio-inline'>
					<button type='submit' id='register' class='btn' value='Enregistrer les modifications'>Valider</button>
					</label>
					".csrf_field()."
					<input type='button' class='btn' onclick='location.href=\"".$event_id."/".$util->utilisateur_id."\";' value='Supprimer' />
					</li>
					<input type='hidden' name='id_event' value='".$event_id."'>
					<input type='hidden' name='id_user' value='".$util->utilisateur_id."'>
					</form>
					";
				}
			}
			else
			foreach($utilisateurs as $util){
				echo "
				<li>".$util->pseudo."</li>
				";
			}
		?>
        </ul>

    </div>



<?php
    include 'footer.php';
?>