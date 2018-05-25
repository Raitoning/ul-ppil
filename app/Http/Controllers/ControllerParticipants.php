<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;
use App\models\evenement;

class ControllerParticipants extends Controller
{
    public static function getParticipants($event_id){
		$event = evenement::where('evenement_id',$event_id)->first();
		
	    $utilisateurs = $event->utilisateur;
		return $utilisateurs;
    }
	
	public static function suppParticipants($id_event, $id_user){
		if(Session::has('utilisateur')){
			if(ControllerParticipants::estProprio($id_event,Session::get('utilisateur')->utilisateur_id)){
				
				$event = evenement::find($id_event);
				$tmp = $event->utilisateur()->detach($id_user);
				return redirect('event/participants/'.$id_event);
			}
			return redirecr('/accueil');
		}
		
	}
	
	public static function estProprio($id_event, $id_user){
		
		$event = evenement::find($id_event);
		$droit = $event->utilisateur()->find($id_user)->pivot->droit;
		if($droit == "proprietaire"){
			return true;
		}
		else return false;
	}
}

?>
