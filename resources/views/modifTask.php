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
                <h1>Modification d'une tâche:</h1>
            </div>

            <div class="card-body" style="display : flex; justify-content: space-around;">
                <div class="col-6">
                    <form enctype="multipart/form-data" action="/event/task/modif/<?php echo $id_task; ?>/photo" method="post">
                        <br>
                        <div class="form-group">
                            <label>Nom de la tâche :</label>
                            <br>
                            <input type="text" value="<?php echo $tache->nom; ?>" name="task" required>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <label>Description :</label>
                            <br>
                            <input type="text" value="<?php echo $tache->description; ?>" name="desc" required>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <label>Quantité :</label>
                            <br>
                            <input type="text" value="<?php echo $tache->quantiteTotal; ?>" name="quantity">
                            <br>
                            <br>
                        </div>
                        
                        <?php
                        if($type->datefin == 1){
                            ?>
                        <div class="form-group">
                            <label>Date de fin :</label>
                            <br>
                            <input type="date" name="datefin" value="<?php echo $tache->datefin; ?>">
                            <br>
                            <br>
                        </div>
                        <?php } ?>
                        
                        <?php
                        $i = 0;
                        while($i < $type->texte){
                            ?>
                        <div class="form-group">
                            <label>Texte <?php echo $i+1 ?> :</label>
                            <br>
                            <input type="text" value="<?php echo /*ControllerTache::getText()*/"" ; ?>" name="text<?php echo $i?> required">
                            <br>
                            <br>
                        </div>
                        <?php $i++; }?>

                </div>
                <div class="col-6">
                    <div class="card md-3">
                        <div class="card-header">
                            <h2>Participants</h2>
                        </div>
                        <div class="card-body">
                            <?php
                           /* $i = 0;
                            $participants = App\Http\Controllers\ControllerParticipants::getParticipants($event);
                                foreach($participants as $participant){
                                    echo "<li class='list-group-item'><input type='checkbox' name='participants[]' value=$participant->utilisateur_id>".$participant->pseudo."</li></a>";
                                    $i++;
                                }
                                */
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='col-12'>
            <?php 
            $i = 0;
            while($i < $type->photo){
                echo'
                  <p>
                    <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer l\'image :</label>
                    <input type="file" name="photo'.$i.'" multiple/>
                  </p>
                ';
                $i++;
            }
            ?>
            
                        
            <input type="button" class="btn btn-primary" onclick="location.href='/event/task/<?php echo " $id_task "; ?>';" value="Retour" />
            <input type="submit" id="creer" class="btn btn-success" value="Modifier">
            <input type="button" id="suppr" class="btn btn-danger" onclick="location.href='/event/task/suppr/<?php echo "$id_task"; ?>';" value="Supprimer la tâche">
            <?php echo csrf_field(); ?>
            </div>

            
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php include("footer.php");?>
