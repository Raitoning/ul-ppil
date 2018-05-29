<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotifContoller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;
use App\models\evenement;
use App\models\contact;

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
				NotifController::notifSuppressionEvenement(Session::get('utilisateur')->utilisateur_id, $id_user, $id_event) ;
				return redirect('event/participants/'.$id_event);
			}
			return redirect('/accueil');
		}
		
	}

 	public static function demandeInscriptionPublic($id_event){
		if(Session::has('utilisateur')){
			$evenement = evenement::where('evenement_id','=',$id_event)->first();
			$proprietaire = $evenement->utilisateur()->wherePivot('droit', 'proprietaire')->first();

			//TODO : envoie de la notif au proprietaire
			NotifController::notifRejoindreEvenement(Session::get('utilisateur')->utilisateur_id, $proprietaire->utilisateur_id, $id_event);

			return redirect('event/'.$id_event);
			
		}
	}

	public static function accordInscription($id_user, $id_event){
		if(Session::has('utilisateur')){

			//ajout de l'utilisateur à l'événement
			$event = evenement::where('evenement_id','=',$id_event)->first();
			$droit = 'aucun'; 
			$event->utilisateur()->attach($id_user,['droit'=>$droit]);
			
			return redirect('event/'.$id_event);
			
		}
	}

	public static function desinscription($id_event){
		if(Session::has('utilisateur')){
			if(!ControllerParticipants::estProprio($id_event,Session::get('utilisateur')->utilisateur_id)){
				$event = evenement::find($id_event);
				$proprietaire = $event->utilisateur()->wherePivot('droit', 'proprietaire')->first();
				$event->utilisateur()->detach(Session::get('utilisateur')->utilisateur_id);
				NotifController::notifDesinscEvenement(Session::get('utilisateur')->utilisateur_id, $proprietaire->utilisateur_id, $id_event) ;
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

	public static function estEditeur($id_event, $id_user){
		$event = evenement::find($id_event);
		try{
			$droit = $event->utilisateur()->find($id_user)->pivot->droit;
		}
		catch(\Exception $e){
			return false;
		}
		if($droit == "edition"){
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
	
	public static function demandeDroits($event_id){
		$event = evenement::find($event_id);
		$proprietaire = $event->utilisateur()->wherePivot('droit', 'proprietaire')->first();
		NotifController::notifDemandeDroit(Session::get('utilisateur')->utilisateur_id, $proprietaire->utilisateur_id, $event_id) ;
		return redirect('event/'.$event_id);
	}

	public static function accordDroits($user_id, $event_id){
		$droit = "edition";
		$event = evenement::find($event_id);
		$tmp = $event->utilisateur()->updateExistingPivot($user_id,['droit' => $droit]);
		return redirect('notices');
	}
	
	public static function droitParticipant(Request $request){
		$event_id = $request->id_event;
		$user_id = $request->id_user;
		$droit = $request->rights;
		$event = evenement::find($event_id);
		if($event->utilisateur->find($user_id)->pivot->droit != $droit){
			$tmp = $event->utilisateur()->updateExistingPivot($user_id,['droit' => $droit]);
			NotifController::notifChangementDroit(Session::get('utilisateur')->utilisateur_id,$user_id,$event_id);
			if($droit == "proprietaire"){
				$event = evenement::find($event_id);
				$event->utilisateur()->updateExistingPivot(Session::get('utilisateur')->utilisateur_id,['droit' => 'edition']);
			}
		}
		
		return redirect('event/participants/'.$event_id);
	}

	public static function getFavoris($event_id){
		$res = array();
			
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$contacts = contact::where('utilisateur_utilisateur_id', '=', $utilisateur_id )->get();
		
		$event = evenement::find($event_id)->utilisateur();
		foreach ($contacts as $contact) {
			
			$t = $event->where('utilisateur_utilisateur_id',$contact->contact_contact_id)->first();
			if(empty($t)){
				array_push($res,$userContact = utilisateur::where('utilisateur_id', '=', $contact->contact_contact_id)->first());
			}
		}
			
		return $res;
	}
	
	public static function getUtilisateurs($event_id){
			
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		
		$tmp = array($utilisateur_id);
		
		$contacts = contact::where('utilisateur_utilisateur_id', '=', $utilisateur_id )->get();
		foreach ($contacts as $contact) {
			array_push($tmp,$contact->contact_contact_id);
		}

		$pascontact = utilisateur::whereNotIn('utilisateur_id', $tmp)->get();
		$res = array();
		
		$event = evenement::find($event_id)->utilisateur();
		foreach ($pascontact as $utilisateurNonContact){
			$k = $event->where('utilisateur_utilisateur_id',$utilisateurNonContact->utilisateur_id)->first();
			
			if(empty($k))
				array_push($res,$utilisateurNonContact);
		}
		
		return $res;
	}
	
	public static function ajouter($event_id, $user_id){
		NotifController::notifAjoutEvenement(Session::get('utilisateur')->utilisateur_id, $user_id, $event_id) ;
		return redirect("event/participants/".$event_id."/ajoutUtilisateurs");
	}

	public static function participe($id_user, $id_event){
		$participants = controllerParticipants::getParticipants($id_event);

		foreach ($participants as $participant) {
			if($participant->utilisateur_id == $id_user){
				return true ;
			}
		}

		return false ;
	}

}

?>
