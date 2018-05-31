<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 // page d'accueil

Route::get('/',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else
    return view('login');
});

// Accès anonyme

Route::get('/publicsEvents',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else
    return view('publicsEvents');
});

//inscription - deconnexion

Route::get('/login',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else
    return redirect('/');
});

Route::get('/inscription',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else return view('signup');
});

Route::get('/lostpw',function(){
  if(Session::has('utilisateur'))
    return redirect('accueil');
  else return view('lostpw');
});


// page d'accueil de l'utilisateur

Route::get('/accueil',function(){
  if(Session::has('utilisateur'))
    return view('accueil');
  else return redirect('login');
});

Route::get('/contacts',function(){
  if(Session::has('utilisateur'))
    return view('contacts');
  else return redirect('login');
});

Route::get('/account',function(){
  if(Session::has('utilisateur'))
    return view('account');
  else return redirect('login');
});

Route::get('/notices',function(){
  if(Session::has('utilisateur'))
    return view('notices');
  else return redirect('login');
});

Route::get('/taskType',function(){
  if(Session::has('utilisateur'))
    return view('taskType');
  else return redirect('login');
});

//types de tâche 

Route::get('/taskType/ajoutTypeTache',function(){
  if(Session::has('utilisateur'))
    return view('newTaskType');
  else return redirect('login');
});

Route::post('/taskType/ajoutTypeTache','ControllerTypeTache@newType');

Route::get('/taskType/modifTypeTask/{type_id}',function($type_id){
  if(Session::has('utilisateur'))
    return view('modifTypeTask', ["type_id" => $type_id]);
  else return redirect('login');
});

Route::post('/taskType/modifTypeTask/{type_id}','ControllerTypeTache@modifType');
Route::get('/taskType/supprTypeTask/{task_id}','ControllerTypeTache@supprType');

// Evenements

Route::get('/newEvent',function(){
  if(Session::has('utilisateur'))
    return view('newEvent');
  else return redirect('login');
});

Route::get('/events',function(){
  if(Session::has('utilisateur'))
    return view('events');
  else return redirect('login');
});

Route::get('/event/{event}',function($event){
    return view('event', ["event_id" => $event]);
});

Route::get('/event/modifEvent/{event_id}',function($event_id){
  if(Session::has('utilisateur'))
    return view('modifEvent', ["event_id" => $event_id]);
  else return redirect('login');
});

Route::get('/consultationPublic/{event_id}','ControllerEvenement@consultationPublic');

Route::get('/event/participants/{event_id}',function($event_id){
  if(Session::has('utilisateur'))
    return view('participants', ["event_id" => $event_id]);
  else return redirect('login');
});

Route::get('/event/changerDroits/{id_event}','ControllerParticipants@demandeDroits');
Route::get('/event/modifEvent/suppression/{id_event}','ControllerEvenement@supprimerEvenement');


Route::get('/event/demandeInscription/{id_event}','ControllerParticipants@demandeInscriptionPublic');
Route::get('/event/desinscription/{id_event}','ControllerParticipants@desinscription');

Route::post('/event/participants/droits','ControllerParticipants@droitParticipant');

Route::get('/event/participants/{event_id}/ajoutUtilisateurs',function($event_id){
  if(Session::has('utilisateur'))
    return view('ajoutParticipants', ["event_id" => $event_id]);
  else return redirect('login');
});

Route::get('/event/participants/ajouter/{event_id}/{user_id}','ControllerParticipants@ajouter');

Route::get('/event/participants/{id_event}/{id_user}','ControllerParticipants@suppParticipants');



// Tâches

Route::get('event/newTask/{event_id}/{typetache}',function($event_id,$typetache){
  if(Session::has('utilisateur'))
    return view('newTask',['event' => $event_id,'typetache' => $typetache]);
  else return redirect('login');
});

Route::get('/event/task/{tache_id}',function($tache_id){
    return view('task', ["tache_id" => $tache_id]);
});

Route::get('/event/task/modif/{tache_id}',function($id_task){
    return view('modifTask', ["id_task" => $id_task]);
});

Route::get('/event/task/contribution/{tache_id}',function($id_task){
    return view('contribution', ["id_task" => $id_task]);
});

Route::post('/event/task/modif/{tache_id}','ControllerTache@modifierTache');
Route::get('/event/task/suppr/{tache_id}','ControllerTache@supprimerTache');
Route::get('/event/task/valide/{tache_id}','ControllerTache@valideTache');
Route::get('/event/task/annuleValide/{tache_id}','ControllerTache@annuleValideTache');

Route::post('/event/task/contribution/{tache_id}','ControllerTache@contributionTache');

Route::get('/event/task/supprParticipant/{id_task}/{id_user}','ControllerTache@supprParticipants');
Route::get('/event/task/inscription/{task_id}','ControllerTache@inscription');
Route::get('/event/task/desinscription/{task_id}','ControllerTache@desinscription');




Route::post('/','ControllerConnexion@connexion');
Route::post('/deconnexion','ControllerConnexion@deconnexion');
Route::post('/inscription','ControllerInscription@inscription');


Route::post('/account','ControllerUpdate@updateInfo');
Route::get('/supprimerCompte','ControllerConnexion@supprimerCompte');

Route::get('/supprimerContact/{pseudo}','ControllerContacts@supprimerContact');
Route::get('/ajoutContact/{pseudo}','ControllerContacts@ajoutContact');
Route::post('/event/newTask/{event_id}','ControllerTache@formulaire');
Route::post('/newEvent','ControllerEvenement@newEvent');
Route::post('/event/modifEvent/{event}','ControllerEvenement@updateEvent');


Route::get('/notices','NotifController@renderNotifications');
Route::get('/notices/supprimerNotif/{notif_id}','NotifController@supprimerNotif');
Route::get('/notices/accepterNotif/{notif_id}','NotifController@accepterNotif');
Route::get('/notices/refuserNotif/{notif_id}','NotifController@refuserNotif');
Route::post('/event/newTask/{event}/photo','ControllerTache@ajouterTache');
