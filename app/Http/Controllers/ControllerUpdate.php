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

			if(!($request->mdp == "" && $request->cmdp == "")){
				if($request->mdp != $request->cmdp){
					Session::put('erreurUpdate','Erreur à la confirmation du nouveau mot de passe.');
					return redirect('/account');
				}
			}
			else{
				$request->mdp = Session::get('utilisateur')->password;
			}

  			utilisateur::where('utilisateur_id',Session::get('utilisateur')->utilisateur_id)->update(['pseudo'=> $request->pseudo,'password'=> $request->mdp,'mail'=> $request->mail, 'recevoirInvitation'=>$request->invitations,'recevoirMail'=>$request->notif]);
			$utilisateur = utilisateur::where("utilisateur_id", Session::get('utilisateur')->utilisateur_id)->first();
			Session::put('utilisateur',$utilisateur);
			return redirect('/account');
      }
	}


}

?>
