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

			if($request->mdp == "" || $request->cmdp == "" || $request->mail == "" || $request->pseudo == ""){
				Session::put('erreurInscription','Veuillez remplir tout les champs obligatoires et accepter les conditions d\'utilisations.');
				return view("signup");
			}

			$utilisateur = utilisateur::where("pseudo", $request->input("pseudo"))->first();
			if(!empty($utilisateur)){
				Session::put('erreurInscription','Erreur, pseudo déjà existant.');
				return view("signup");
			}

			if(!filter_var($request->mail,FILTER_VALIDATE_EMAIL)){
				Session::put('erreurInscription','Erreur, adresse mail non valide.');
				return view("signup");
			}

			$utilisateur = utilisateur::where("mail", $request->input("mail"))->first();
			if(!empty($utilisateur)){
				Session::put('erreurInscription','Erreur, adresse mail déjà utilisée.');
				return view("signup");
			}

			$newUser = new utilisateur;
			$newUser->pseudo = $request->pseudo;
			$newUser->password = $request->mdp;
			$newUser->mail = $request->mail;


			$newUser->save();
			$newUser->typetache()->attach([1,2,3]);
			return redirect('/')->with("Text","Inscription réussite");
		}

	}
}

?>
