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
			return redirect('/accueil');
		}
		
	}

	public static function desinscription($id_event){
		if(Session::has('utilisateur')){
			if(!ControllerParticipants::estProprio($id_event,Session::get('utilisateur')->utilisateur_id)){
				$event = evenement::find($id_event);
				$tmp = $event->utilisateur()->detach(Session::get('utilisateur')->utilisateur_id);
				return redirect('events');
			}
		}
		
	}
	
	public static function estProprio($id_event, $id_user){
		$event = evenement::find($id_event);
		try{
			$droit = $event->utilisateur()->find($id_user)->pivot->droit;
		}
		catch(\Exception $e){
			return false;
		}
		if($droit == "proprietaire"){
			return true;
		}
		else return false;
	}
	
	public static function getDroit($id_event, $id_user){
		try{
		$event = evenement::find($id_event);
		$droit = $event->utilisateur()->find($id_user)->pivot->droit;
		}
		catch(\Exception $e){
			return "";
		}
		return $droit;
	}
	
	
	public static function droitParticipant(Request $request){
		$event_id = $request->id_event;
		$user_id = $request->id_user;
		$droit = $request->rights;
		$event = evenement::find($event_id);
		$droit = $event->utilisateur()->updateExistingPivot($user_id,['droit' => $droit]);
		
		return redirect('event/participants/'.$event_id);
	}



}

?>
