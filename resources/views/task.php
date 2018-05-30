                <?php
                    include 'header.php'

                ?>

                <div class="col-2">
                    <!-- TODO: Mettre lien retour -->
                    <input type="button" class="btn btn-primary" onclick="location.href='/events'" value="Retour" />
                </div>

                <div class="d-flex justify-content-center align-items-center container">

                    <div class="col-10">

                        <div class="card mb-3">

                            <div class="card-header">

                                <h1>Détails de la tâche</h1>
                            </div>

                            <div class="card-body">

                                <label>Nom de la tâche : </label>

                                <?php
                                    //affichage du nom de la tâche
                                     use App\Http\Controllers\ControllerEvenement;
                                    use App\Http\Controllers\ControllerParticipants;
                                    use App\Http\Controllers\ControllerTache;
                                
                                    $taskInfo= ControllerTache::getTaskInfo($tache_id);

                                  //  foreach($tasks as $task){
                                      echo $taskInfo->nom;
                                    //}
                                ?>

                                <div id="Desc">

                                    <label>Descriptif de la tâche :
                                        <br>
                                    </label>

                                    <?php
                                        //affichage descriptif de la tâche
                                      echo $taskInfo->description;
                                    ?>
                                </div>

                                <div id="quantity">

                                    <label>Quantité :
                                        <?php  echo $taskInfo->quantiteTotal ;?>
                                    </label>

                                </div>

                                <div id="participants">

                                    <label>Participants:
                                        <ul class="list-group">
                                                <?php   

                                                    $utilisateurs = ControllerTache::getParticipants($tache_id);
                                                    
                                                    if(ControllerTache::estProprio($tache_id,Session::get('utilisateur')->utilisateur_id)) {

                                                        foreach($utilisateurs as $util) {

                                                            if($util->utilisateur_id != Session::get('utilisateur')->utilisateur_id) {

                                                                echo "<form action='droits' method='post'>

                                                                    <li class='list-group-item list-group-item-action'>

                                                                        <div class='row'>

                                                                            <div class='col-auto'>

                                                                                ".$util->pseudo."

                                                                            </div>

                                                                                <div class='col-auto'>
                                                                                    <input type='button' class='btn btn-danger' onclick='location.href=\"/event/task/supprParticipant/".$tache_id."/".$util->utilisateur_id."\";' value='Supprimer' />
                                                                                </div>
                                                                            </li>
                                                                        </div>

                                                                        <input type='hidden' name='id_event' value=''>
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
                                        <br>
                                    </label>

                                </div>
                            </div>

                            <?php 
                                if(ControllerTache::participe(Session::get('utilisateur')->utilisateur_id, $tache_id)){
                                    echo
                                    "<div class=\"col-md-auto\">
                                        <input type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='desinscription/".$tache_id."';\" value=\"Se désinscrire\" />
                                    </div>" ;
                                }
                            ?>
                        </div>

                    </div>
                </div>

                <?php
                    include 'footer.php'
                ?>
