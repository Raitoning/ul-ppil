<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotifController;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\evenement;
use App\models\utilisateur;

class ControllerEvenement extends Controller
{

	public function newEvent(Request $request){
		
		if($request->name == "" || $request->desc == "" || $request->lieu == "" ){
			Session::put('erreurInscription','Veuillez remplir tout les champs obligatoires.');
			return view("newEvent");
		}

		if(! is_null($request->dateDeb)){
			if( strtotime($request->dateDeb) < time()-(1 * 23 * 58 * 60)){
				Session::put('erreurInscription','La date de début ne doit pas être dépassée.');
				return view("newEvent");
			}
		}

		if(! is_null($request->dateFin)){
			if(is_null($request->dateDeb)){
				Session::put('erreurInscription','Il n\'y a pas de date de début.');
				return view("newEvent");
			}elseif( strtotime($request->dateDeb) > strtotime($request->dateFin)){
				Session::put('erreurInscription','La date de fin est anterieur à la date de début.');
				return view("newEvent");
			}
		}
		
		$newEvent = new evenement;
		$newEvent->intitule = $request->name;
		$newEvent->description = $request->desc;
		$newEvent->lieu = $request->lieu;

		if(! is_null($request->dateDeb)){
			$newEvent->dateDebut = $request->dateDeb;
			if( !is_null($request->dateFin)){
				$newEvent->dateFin = $request->dateFin ;
			}
		}
		
		if($request->genre == "Privé"){
			$newEvent->public = false;
		}else{
			$newEvent->public = true;
		}

		$newEvent->notification = true ;

		if($request->suppr == null){
			$newEvent->suppressionAutomatique = false ;
		}else{
			$newEvent->suppressionAutomatique = true ;
		}
		
		$newEvent->save();


		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$evenement = evenement::where('evenement_id','=',$newEvent->evenement_id)->first();
		$droit = 'proprietaire'; // Au choix : 'proprietaire','editeur','visiteur' 
		$evenement->utilisateur()->attach($utilisateur_id,['droit'=>$droit]);
		
		return redirect('/event/'.$newEvent->evenement_id)->with("Text","Nouvel événement créé !");
		

	}

	public function updateEvent(Request $request, $id){

		$event = evenement::where('evenement_id',$id)->first();

		if((strtotime($event->dateDebut) != strtotime($request->dateDeb)) && strtotime($event->dateDebut) < time()-(1 * 23 * 58 * 60) ){
			Session::put('erreurInscription','La date de début ne peut être modifiée, l\'événement à déjà commencé.');
			return redirect("event/modifEvent/".$id);
		}

		if(strtotime($event->dateDebut) != strtotime($request->dateDeb) ){
			if( strtotime($request->dateDeb) < time()-(1 * 23 * 58 * 60)){
				Session::put('erreurInscription','La date de début ne doit pas être dépassée.');
				return redirect("event/modifEvent/".$id);
			}
		}

		if(! is_null($request->dateFin)){
			if( strtotime($request->dateDeb) > strtotime($request->dateFin)){
				Session::put('erreurInscription','La date de fin est anterieur à la date de début.');
				return redirect("event/modifEvent/".$id);
			}
			if( strtotime($event->dateFin) != strtotime($request->dateFin) && strtotime($request->dateFin) < time()-(1 * 23 * 58 * 60)){
				Session::put('erreurInscription','La date de fin ne doit pas être dépassée.');
				return redirect("event/modifEvent/".$id);
			}
		}

		if($request->suppr == null){
			$suppr = false ;
		}else{
			$suppr = true ;
		}

		if($request->genre == "Privé"){
			$genre = false;
		}else{
			$genre = true;
		}

		evenement::where('evenement_id',$id)->update(['intitule'=> $request->name,'dateDebut'=> $request->dateDeb,'dateFin'=> $request->dateFin, 'suppressionAutomatique'=>$suppr,'public'=>$genre, 'description'=> $request->desc, "lieu"=> $request->lieu]);
			
			return redirect('/event/'.$id);
	}

	public static function supprimerEvenement($event_id){

		$event = evenement::find($event_id);

		$participants = ControllerParticipants::getParticipants($event_id);
		foreach ($participants as $participant) {
			if(Session::get('utilisateur')->utilisateur_id != $participant->utilisateur_id)
				NotifController::notifSupprEvenement(Session::get('utilisateur')->utilisateur_id, $participant->utilisateur_id, $event_id) ;
		}
		$tmp = $event->utilisateur()->detach();
		$evenement = evenement::where('evenement_id','=',$event_id)->first();
		$evenement->delete();

		return redirect('/events/');
	}


	public static function getUserEvents(){
		
		$res = array();
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$user = utilisateur::where('utilisateur_id', '=', $utilisateur_id)->first();
		foreach ($user->evenement as $event) {
		    //Chaque evenements de l'utilisateur (variable $user->evenement) dans la variable $event 
		    if(!is_null($event->dateFin)){
		    	if(!($event->suppressionAutomatique == 1) && (strtotime($event->dateFin) > time()+(1 * 23 * 58 * 60))){
					array_push($res,$event);	
		    	}
		    }else{
		    	array_push($res,$event);
		    }
		    
		}
		return $res;
	}

	public static function getPublicsEvents(){
		$res = array();
		$events = evenement::where('public', '=', 1)->get();
		foreach ($events as $event) {
			if(! ControllerParticipants::participe(Session::get('utilisateur')->utilisateur_id, $event->evenement_id)){
			    if(!is_null($event->dateFin)){
			    	if(!($event->suppressionAutomatique == 1) && (strtotime($event->dateFin) > time()+(1 * 23 * 58 * 60))){
						array_push($res,$event);	
			    	}
			    }else{
			    	array_push($res,$event);
			    }
			}
		}
		return $res;
	}

	public static function getEvent($event_id){
		$event = evenement::where('evenement_id', '=', $event_id)->first();
		return $event ;
	}
	
	public static function consultationPublic($event_id){
		$event = evenement::where('evenement_id', '=', $event_id)->first();
		if(!Session::has('utilisateur') && $event->public == 1){
			return view('consultationEvenement',["event_id" => $event_id]);
		}
		else return redirect('/public/accueil');
	}

	public static function estPublic($event_id){
		$event = controllerEvenement::getEvent($event_id);
		return $event->public == 1 ;
	}
}

?>