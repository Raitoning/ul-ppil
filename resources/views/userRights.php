<?php
    include 'header.php';
?>

    <?php

        /* if(Session::has('erreurInscription')) {
         *     echo "<div class='alert alert-danger' role='alert'>"
         *     .Session::get('erreurInscription').
         *     "</div>";
         *     Session::forget('erreurInscription');
         * }

         * // Récupérer l'événement
         * use App\Http\Controllers\ControllerTache;
         * $event = ControllerTache::getTache($tache_id);  //TODO cas général
         */
    ?>

    <div class="container">

        <div class="row">

            <h1>Droits du participant</h1>
        </div>

        <div class="row">

            <form action="" method="post">

                <label>Droits de l'utilisateur:</label><br>
                <input type="radio" name="rights" value="proprietaire" checked> Propriétaire<br>
                <input type="radio" name="rights" value="edition"> Edition<br>
                <input type="radio" name="rights" value="aucun"> Aucun 

                <div class="row">
                    <div class="col_1">
                        <button type="submit" id="register" class="btn btn-primary" value="Enregistrer les modifications">Enregistrer les modifications</button><br>
                        <?php echo csrf_field(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>


<?php
    include 'footer.php';
?>