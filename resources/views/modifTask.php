<?php
    include 'header.php';
?>

    <div class="container">
        <div class="row">
            <h1>Modifier la tâche</h1>
        </div>

    	<?php if(Session::has('erreurInscription')){
			echo "<div class='alert alert-danger' role='alert'>"
					.Session::get('erreurInscription').
				"</div>";
		    	Session::forget('erreurInscription');
		    }

			//récupérer l'événement
			use App\Http\Controllers\ControllerTache;
			$event = ControllerTache::getTache($tache_id);  //TODO cas général
		?>

        <div class="row">
            <form action="" method="post">
                <div class="newTask">
                    <br>
                    <div class="form-group">
                        <label>Nom de la tâche :</label><br>
                        <input type="text" class="form-control" placeholder="Nom de la tâche" name="task" value=<?php echo $tache->intitule; ?>><br><br>
                    </div>
                    <div class="form-group">
                        <label>Description :</label><br>
                        <input type="text" class="form-control" placeholder="Description" name="desc" value=<?php echo $tache->description; ?>><br><br>
                    </div>
                    <div class="form-group">
                    <label>Type de la tâche : </label>
                        <select name="Type de tâche">
                        <option value="typetask1" <?php if($tache->type == 1) echo "selected"; ?>>Type 1</option>
                        <option value="typetask2" <?php if($tache->type == 1) echo "selected"; ?>>Type 2</option>
                        <option value="typetask3" <?php if($tache->type == 1) echo "selected"; ?>>Type 3</option>
                        <option value="typetask4" <?php if($tache->type == 1) echo "selected"; ?>>Type 4</option>

                        <!-- TODO séléction des différents types de tâches -->
                        </select><br><br>
                    </div>
                    <div class="row">
                        <div class="col_1">
                            <button type="submit" id="register" class="btn btn-primary" value="Enregistrer les modifications">Enregistrer les modifications</button><br>
                            <?php echo csrf_field(); ?>
                        </div>
                    </div>
                </div>
            </form>
	    </div>
    </div>

<?php
    include 'footer.php';
?>