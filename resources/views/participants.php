<?php
    include 'header.php';
?>

    <div class='container'>
        <h1>Participants à l'évènement</h1>

        <ul>
            <li>PLACEHOLDER</li>
            <li>PLACEHOLDER</li>
            <li>PLACEHOLDER</li>
            <li>PLACEHOLDER</li>
            <li>PLACEHOLDER</li>

            <?php
                // PLACEHOLDER CODE
                // Affichage des participants à l'évènement
                use App\Http\Controllers\ControllerEvenement;
                $users = ControllerEvenement::getUserEvents();
                
                foreach($users as $user){
                    echo "<li>".$user->nom."</li>";
                }
		    ?>
        </ul>

    </div>



<?php
    include 'footer.php';
?>