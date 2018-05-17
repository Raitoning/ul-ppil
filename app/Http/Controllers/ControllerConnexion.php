<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;

class ControllerConnexion extends Controller
{
    public function connexion(Request $request){
      if(Session::has('utilisateur'))
		return view('');
      else{
	    $utilisateur = utilisateur::where("pseudo", $request->input("user"))->where("password", $request->input("mdp"))->first();
		if(!empty($utilisateur)){
		  Session::put('utilisateur',$utilisateur);
		  return view('index');
		}
		else{
		  return view("erreur")->with("text","Erreur d'identification.");
		}
      }
    }
	
	public function deconnexion(Request $request){
		
		if(Session::has('utilisateur')){
			Session::forget('utilisateur');
			return redirect('/');
		}
		
	}
}

?>