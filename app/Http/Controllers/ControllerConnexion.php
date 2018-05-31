<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotifController;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;
use App\models\evenement;

class ControllerConnexion extends Controller
{
    public function connexion(Request $request){
      if(Session::has('utilisateur'))
		return redirect('/');
      else{
	    $utilisateur = utilisateur::where("pseudo", $request->input("user"))->where("password", $request->input("mdp"))->first();
		if(!empty($utilisateur)){
		  Session::put('utilisateur',$utilisateur);
		  return view('accueil');
		}
		else{
		  Session::put('erreurConnexion','Erreur d\'identification');
		  return view("login");
		}
      }
    }

	//TODO: affichage evenement
	/*public static function getEventUtil(){

		$user = utilisateur::where('idUtilisateur', '=', Session::get('utilisateur')->idUtilisateur)->first();
		return $user->evenement();

	}*/

	public function deconnexion(Request $request){

		if(Session::has('utilisateur')){
			Session::flush();
		}
		return redirect('/');

	}

	public function supprimerCompte(Request $request){

		if(Session::has('utilisateur')){

			$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
			$user = utilisateur::where('utilisateur_id', '=', $utilisateur_id)->first();
			foreach ($user->evenement as $event) {
			    //Chaque evenements de l'utilisateur (variable $user->evenement) dans la variable $event 
			    
				if(ControllerParticipants::estProprio($event->evenement_id, $utilisateur_id)){
					ControllerTache::supprTaches($event) ;
					NotifController::supprNotifModule($event->evenement_id, "evenement") ;
					$tmp = $event->utilisateur()->detach();
					$event->delete();
				}else{
					$event->utilisateur()->detach(Session::get('utilisateur')->utilisateur_id);
				}
			}

			NotifController::supprNotifUser(Session::get('utilisateur')->utilisateur_id) ;
			utilisateur::where('utilisateur_id',Session::get('utilisateur')->utilisateur_id)->delete();
			Session::flush();
			return redirect('/');
		}
		return redirect('/');
	}
}

?>