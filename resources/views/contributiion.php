<?php include("header.php");
$link = $_SERVER['PHP_SELF'];
use App\Http\Controllers\ControllerTypeTache;
use App\Http\Controllers\ControllerParticipants;
use App\Http\Controllers\ControllerEvenement;
use App\Http\Controllers\ControllerTache;
$utilisateur = Session::get('utilisateur')->utilisateur_id;
$tache = ControllerTache::getTaskInfo($id_task) ;
$type = ControllerTypeTache::getType($tache->typetache_typetache_id);
$event = ControllerTache::getEvent($id_task) ;
?>

<div class="d-flex justify-content-center align-items-center container">
    <div class="col-10">
        <div class="card mb-3">
            <div class="card-header">
                <h1>Modifictaion d'une tâche:</h1>
            </div>

            <div class="card-body" style="display : flex; justify-content: space-around;">
                <div class="col-6">
                    <form enctype="multipart/form-data" action="/event/task/contribution/<?php echo $id_task; ?>" method="post">
                        <br>
                        <div class="form-group">
                            <label>Nom de la tâche :</label>
                            <?php echo $tache->nom; ?>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <label>Quantité Total:</label>
                            <?php echo $tache->quantiteTotal; ?>
                            <br>
                            <br>
                        </div>
                        
                        <div class="form-group">
                            <label>Votre contribution :</label>
                            <br>
                            <input type="number"  name="quantity" min="0" max="<?php echo ControllerTache::calculQuantiteMax($id_task); ?>" required>
                            <br>
                            <br>
                        </div>

            <input type="button" class="btn btn-primary" onclick="location.href='/event/task/<?php echo " $id_task "; ?>';" value="Retour" />
            <input type="submit" id="creer" class="btn btn-success" value="Enregistrer">
            <?php echo csrf_field(); ?>
            </div>

            
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php include("footer.php");?>
