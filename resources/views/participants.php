<?php
    include 'header.php';
	use App\Http\Controllers\ControllerParticipants;
?>

    <div class='container'>
        <h1>Participants à l'évènement</h1>

        <ul>
		<?php

			$utilisateurs = ControllerParticipants::getParticipants($event_id);
			if(ControllerParticipants::estProprio($event_id,Session::get('utilisateur')->utilisateur_id))
			foreach($utilisateurs as $util){
				echo "
				<li>".$util->pseudo."
				<input type='button' class='btn' onclick='location.href=\"".$event_id."/".$util->utilisateur_id."\";' value='Supprimer' />
				</li>
				";
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