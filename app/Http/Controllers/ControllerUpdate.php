<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;

class ControllerUpdate extends Controller
{
	public function updateInfo(Request $request){
		if(!Session::has('utilisateur'))
			return redirect('/');
      	else{
			
			if(!filter_var($request->mail,FILTER_VALIDATE_EMAIL)){
				Session::put('erreurUpdate','Erreur, adresse mail non valide.');
				return redirect('/account');	
			}
			
			$util = utilisateur::where("pseudo", $request->input("pseudo"))->first();
			if(!empty($util) && $util->pseudo != Session::get('utilisateur')->pseudo){
				Session::put('erreurUpdate','Erreur, pseudo déjà existant.');
				return redirect('/account');
			}
			
			$util2 = utilisateur::where("mail", $request->input("mail"))->first();
			if(!empty($util2) && $util2->mail != Session::get('utilisateur')->mail){
				Session::put('erreurUpdate','Erreur, adresse mail déjà utilisée.');
				return redirect('/account');
			}
			
  			utilisateur::where('idUtilisateur',Session::get('utilisateur')->idUtilisateur)->update(['pseudo'=> $request->pseudo,'password'=> $request->mdp,'mail'=> $request->mail, 'recevoirInvitation'=>$request->invitations,'recevoirNotif'=>$request->notif]);
			$utilisateur = utilisateur::where("idUtilisateur", Session::get('utilisateur')->idUtilisateur)->first();
			Session::put('utilisateur',$utilisateur);
			return redirect('/account');
      }
	}
	
	
}

?>