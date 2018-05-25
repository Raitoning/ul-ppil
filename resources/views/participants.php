<?php
    include 'header.php';
	use App\Http\Controllers\ControllerParticipants;
?>

    <div class='container'>
        <h1>Participants à l'évènement</h1>

        <ul>
		<?php

			$utilisateurs = ControllerParticipants::getParticipants($event_id);
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