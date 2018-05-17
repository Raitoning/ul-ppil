<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;

class ControllerInscription extends Controller
{

	public function inscription(Request $request){
		
		if(Session::has('utilisateur')){
			return redirect('/');
		}
		else{
			
			if($request->mdp != $request->cmdp){
				Session::put('erreurInscription','Les mots de passe sont différents.');
				return view("signup");
			}
			
			if($request->mdp == "" || $request->cmdp == "" || $request->mail == "" || $request->pseudo == "" || $request->conditions == false){
				Session::put('erreurInscription','Veuillez remplir tout les champs obligatoires et accepter les conditions d\'utilisations.');
				return view("signup");
			}
			
			$utilisateur = utilisateur::where("pseudo", $request->input("pseudo"))->first();
			if(!empty($utilisateur)){
				Session::put('erreurInscription','Erreur, pseudo déjà existant.');
				return view("signup");
			}
			
			$newUser = new utilisateur;
			$newUser->pseudo = $request->pseudo;
			$newUser->password = $request->mdp;
			$newUser->mail = $request->mail;
			$newUser->recevoirInvitation = "";
			
			$newUser->save();
			
			return redirect('/')->with("Text","Inscription réussite");
		}
		
	}
}

?>