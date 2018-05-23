<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\notification;
use App\models\utilisateur;
use Illuminate\Support\Facades\DB;

class NotifController extends Controller
{

    public function renderNotifications(){
      $user = Session::get('utilisateur');
      //var_dump($user);

      //$notifications = DB::table('notification')->select('id_emetteur', 'action', 'module', 'type')->where('id_recepteur', $user )->get();
      $notifications = DB::table('notification')->where('id_recepteur', $user->utilisateur_id)->get();

      $notices = [];
      foreach($notifications as $notification){
        $notices[] = $this->genererMessage($notification);
      }
      return view('notices', ['notices' => $notices]);
    }
    public static function notifAjoutContact($id_emetteur, $id_recepteur){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'contact', 'ajout', 'invitation', '']);
    }

    public static function notifAccordContact($id_emetteur, $id_recepteur){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'contact', 'accord', 'invitation', '']);
    }

    public static function notifAjoutEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'ajout', 'invitation', $id_evenement]);
    }

    public static function notifSuppressionEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'suppression', 'invitation', $id_evenement]);
    }

    public static function notifAjoutTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'ajout', '', $id_tache]);
    }

    public static function notifSuppressionTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'suppression', '', $id_tache]);
    }

    public function supprimerNotif($id_notif){
      DB::delete('delete from notification where notification_id = (?)', $id_notif);
    }

    private function genererMessage($notification){
      $message = '';
      $emetteur = DB::table('utilisateur')->where('utilisateur_id', $notification->id_emetteur)->first();

      //On commence par le nom de l'emetteur
      $message .= $emetteur->pseudo.' ';
      // On gere les modules
      switch($notification->module){
        case 'contact':
          switch($notification->action){
            case 'ajout':
              $message .= 'vous a ajouté à ses contacts';
            break;
            case 'accord':
              $message .= 'a accepté votre demande de contact';
            break;
          }
        break;
        case 'evenement':
          $evenement = DB::table('evenement')->where('evenement_id', $notification->id_module)->first();
          switch($notification->action){
            case 'ajout':
                $message .= 'vous a ajouté à un l\'evenement '.$evenement->intitule;
            break;
            case 'suppression':
                if($notification->type == 'invitation'){
                  $message .= 'vous a retiré à un l\'evenement '.$evenement->intitule;
                }else {
                  $message .= 'a supprimé l\'evenement '.$evenement->intitule;
                }
            break;
          }
        break;
        case 'tache':

          $tache = DB::table('tache')->where('tache_id', $notification->id_module)->first();
          $evenement = DB::table('evenement')->where('evenement_id', $tache->evenement_id)->first();
          switch($notification->action){
            case 'ajout':
              $message .= 'vous a assigné la tâche '.$tache->nom.' de l\'evenement '.$evenement->intitule ;
            break;
            case 'suppression':
            if($notification->type == 'invitation'){
              $message .= 'vous a retiré la tâche '.$tache->nom.' de l\'evenement '.$evenement->intitule;
            }else{
              $message .= 'a supprimé la tâche '.$tache->nom.' de l\'evenement '.$evenement->intitule;
            }
            break;
          }
        break;
      }
      return $message;
    }
}
