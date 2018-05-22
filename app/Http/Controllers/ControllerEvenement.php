<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\evenement;
use App\models\utilisateur;

class ControllerEvenement extends Controller
{

	public function newEvent(Request $request){
		
		if($request->name == "" || $request->desc == "" || $request->lieu == "" || is_null($request->dateDeb)){
			Session::put('erreurInscription','Veuillez remplir tout les champs obligatoires.');
			return view("newEvent");
		}

		if( strtotime($request->dateDeb) < time()-(1 * 23 * 58 * 60)){
			Session::put('erreurInscription','La date de début ne doit pas être dépassée.');
			return view("newEvent");
		}

		if(! is_null($request->dateFin)){
			if( strtotime($request->dateDeb) > strtotime($request->dateFin)){
				Session::put('erreurInscription','La date de fin est anterieur à la date de début.');
				return view("newEvent");
			}
		}
		
		$newEvent = new evenement;
		$newEvent->intitule = $request->name;
		$newEvent->description = $request->desc;
		$newEvent->lieu = $request->lieu;
		$newEvent->dateDebut = $request->dateDeb;
		$newEvent->dateFin = $request->dateFin ;
		
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
		
		return redirect('/')->with("Text","Nouvel événement créé !");
		
	}

	public static function getUserEvents(){
		//TODO patch
		/*$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$user = utilisateur::where('utilisateur_id', '=', $utilisateur_id)->first();
		foreach ($user->evenement as $event) {
		    //Chaque evenements de l'utilisateur (variable $user->evenement) dans la variable $event 
			echo $event->intitule ;
		}*/
	}

	public static function getPublicsEvents(){
		//TODO patch (n'affiche que des 1 !)
		$events = evenement::where('public', '=', 1)->first();
		foreach ($events as $event) {
		    //Chaque evenement public dans la variable $event 
			echo $event."<br>" ;
		}
	}

	public static function getEvent($event_id){
		$event = evenement::where('evenement_id', '=', $event_id)->first();
		return $event ;
	}


}

?>