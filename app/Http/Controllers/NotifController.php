<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerParticipants;
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
        $notices[] = $notification;
      }
      return view('notices', ['notices' => $notices]);
    }
    public static function notifAjoutContact($id_emetteur, $id_recepteur){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'contact', 'ajout', 'invitation', null]);
    }

    public static function notifAccordContact($id_emetteur, $id_recepteur){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'contact', 'accord', 'invitation', '']);
    }

    public static function notifRefusContact($id_emetteur, $id_recepteur){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'contact', 'refus', 'invitation', '']);
    }

    public static function notifRejoindreEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'rejoindre', 'invitation', $id_evenement]);
    }

    public static function notifAjoutEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'ajout', 'invitation', $id_evenement]);
    }

    public static function notifAccordEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'accordAjout', '', $id_evenement]);
    }

    public static function notifRefusEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'refusAjout', '', $id_evenement]);
    }

    public static function notifAccordEvenementPublic($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'accordRejoindre', '', $id_evenement]);
    }

    public static function notifrefusEvenementPublic($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'refusRejoindre', '', $id_evenement]);
    }

    public static function notifDesinscEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'desinscription', '', $id_evenement]);
    }

    public static function notifSuppressionEvenement($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'suppression', 'invitation', $id_evenement]);
    }

    public static function notifSupprEvenement($id_emetteur, $id_recepteur, $id_evenement){
		Notification::where('id_module','=',$id_evenement)->delete();
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'evenement', 'suppression', '', $id_evenement]);
    }


    public static function notifDemandeDroit($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'droit', 'ajout', '', $id_evenement]);
    }
	
    public static function notifAccordDroit($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'droit', 'accord', '', $id_evenement]);
    }


    public static function notifChangementDroit($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'droit', 'changement', '', $id_evenement]);
    }

    public static function notifRefusDroit($id_emetteur, $id_recepteur, $id_evenement){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'droit', 'refus', '', $id_evenement]);
    }

    public static function notifAjoutTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'ajout', '', $id_tache]);
    }

    public static function notifAccordTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'accord', '', $id_tache]);
    }

    public static function notifRefusTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'refus', '', $id_tache]);
    }

    public static function notifSuppressionTache($id_emetteur, $id_recepteur, $id_tache){
      DB::insert('insert into notification (id_emetteur, id_recepteur, module, action, type, id_module) values (?, ?, ?, ?, ?, ?)',
      [$id_emetteur, $id_recepteur, 'tache', 'suppression', '', $id_tache]);
    }

    public function supprimerNotif($id_notif){
     DB::delete('delete from notification where notification_id = (?)', [$id_notif]);
     return redirect('notices/');
    }


    public function accepterNotif($id_notif){
      $notif = DB::table('notification')->where('notification_id', $id_notif)->first();

      switch($notif->module){
        
        case 'contact':
          $this->notifAccordContact($notif->id_recepteur, $notif->id_emetteur) ;
        break;
        
        case 'evenement':
          $evenement = DB::table('evenement')->where('evenement_id', $notif->id_module)->first();
          switch($notif->action){
            case 'ajout':
                $this->notifAccordEvenement($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id) ;
                controllerParticipants::accordInscription($notif->id_recepteur, $evenement->evenement_id);
                $this->supprimerNotif($notif->notification_id);
            break;
            case 'rejoindre':
                $this->notifAccordEvenementPublic($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id) ;
                controllerParticipants::accordInscription($notif->id_emetteur, $evenement->evenement_id);
                $this->supprimerNotif($notif->notification_id);
            break;
          }
        break;

        case 'droit':
          $evenement = DB::table('evenement')->where('evenement_id', $notif->id_module)->first();
          controllerParticipants::accordDroits($notif->id_emetteur, $evenement->evenement_id);
          $this->notifAccordDroit($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id);
        break ;

        case 'tache':
          $tache = DB::table('tache')->where('tache_id', $notification->id_module)->first();
          $evenement = DB::table('evenement')->where('evenement_id', $tache->evenement_id)->first();
          $this->notifAccordEvenement($notif->id_recepteur, $notif->id_emetteur,$tache->tache_id) ;

          //TODO: ajout utilisateur a la tache
        break;
      }
      return redirect('notices/');
    }

    public function refuserNotif($id_notif){
      $notif = DB::table('notification')->where('notification_id', $id_notif)->first();

      switch($notif->module){
        
        case 'contact':
          $this->notifRefusContact($notif->id_recepteur, $notif->id_emetteur) ;
        break;
        
        case 'evenement':
          $evenement = DB::table('evenement')->where('evenement_id', $notif->id_module)->first();
          switch($notif->action){
            case 'ajout':
                $this->notifRefusEvenement($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id) ;
				$this->supprimerNotif($notif->notification_id);
            break;
            case 'rejoindre':
                $this->notifRefusEvenementPublic($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id) ;
				$this->supprimerNotif($notif->notification_id);
            break;
          }
        break;

        case 'droit':
          $this->notifRefusDroit($notif->id_recepteur, $notif->id_emetteur,$evenement->evenement_id);
        break ;

        case 'tache':
          $tache = DB::table('tache')->where('tache_id', $notification->id_module)->first();
          $evenement = DB::table('evenement')->where('evenement_id', $tache->evenement_id)->first();
          $this->notifRefusEvenement($notif->id_recepteur, $notif->id_emetteur,$tache->tache_id) ;

          //TODO: ajout utilisateur a la tache
        break;
      }
      return redirect('notices/');
    }

    public static function genererMessage($notification){
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
            case 'refus':
              $message .= 'a refusé votre demande de contact';
            break;
          }
        break;
        case 'evenement':
          $evenement = DB::table('evenement')->where('evenement_id', $notification->id_module)->first();
          switch($notification->action){
            case 'ajout':
                $message .= 'veux vous ajouter à un l\'evenement '.$evenement->intitule;
            break;
            case 'suppression':
                if($notification->type == 'invitation'){
                  $message .= 'vous a retiré à un l\'evenement '.$evenement->intitule;
                }else {
                  $message .= 'a supprimé son evenement ';
                }
            break;
            case 'rejoindre':
              $message .= 'souhaite rejoindre l\'evenement '.$evenement->intitule;
            break;
            case 'accordAjout':
                $message .= 'participera à l\'evenement '.$evenement->intitule;
            break;
            case 'accordRejoindre':
              $message .= 'vous a accepté dans l\'evenement public '.$evenement->intitule;
            break;
            case 'refusAjout':
                $message .= 'ne participera pas à l\'evenement '.$evenement->intitule;
            break;
            case 'refusRejoindre':
              $message .= 'vous a refusé dans l\'evenement public '.$evenement->intitule;
            break;
			case 'desinscription':
				$message .= 's\'est desinscrit de l\'événement : '.$evenement->intitule;
			break;
          }
        break;
        case 'droit' :
          $evenement = DB::table('evenement')->where('evenement_id', $notification->id_module)->first();
          switch($notification->action){
            case 'ajout':
                $message .= 'souhaite être editeur dans l\'evenement '.$evenement->intitule;
            break;
            case 'accord':
                $message .= 'accepte votre demande d\'édition dans l\'evenement '.$evenement->intitule;
            break;
            case 'refus':
              $message .= 'refuse votre demande d\'édition dans l\'evenement '.$evenement->intitule;
            break;
			case 'changement':
              $message .= 'à changé vos droit dans l\'evenement : '.$evenement->intitule;
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
            case 'accord':
              $message .= 'a accepté de participer à la tâche ' .$tache->nom.' de l\'evenement '.$evenement->intitule;
            break;
            case 'refus':
              $message .= 'a refusé de participer à la tâche ' .$tache->nom.' de l\'evenement '.$evenement->intitule;
            break;
          }
        break;
      }
      return $message;
    }
}

