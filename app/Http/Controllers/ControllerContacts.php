<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;
use App\models\contact;

class ControllerContacts extends Controller
{
	public static function getFavoris(){
		
		$res = array();
			
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$contacts = contact::where('utilisateur_utilisateur_id', '=', $utilisateur_id )->get();
		foreach ($contacts as $contact) {
			$userContact = utilisateur::where('utilisateur_id', '=', $contact->contact_contact_id)->first();
			if($userContact->pseudo != Session::get('utilisateur')->pseudo)
				array_push($res,$userContact->pseudo);
		}
			
		return $res;
	}
	
	public static function getUtilisateurs(){
			
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		
		$tmp = array($utilisateur_id);
		
		$contacts = contact::where('utilisateur_utilisateur_id', '=', $utilisateur_id )->get();
		foreach ($contacts as $contact) {
			array_push($tmp,$contact->contact_contact_id);
		}

		$pascontact = utilisateur::whereNotIn('utilisateur_id', $tmp)->get();
		$res = array();
		foreach ($pascontact as $utilisateurNonContact){
			if($utilisateurNonContact->pseudo != Session::get('utilisateur')->pseudo)
				array_push($res,$utilisateurNonContact->pseudo);
		}
		
		return $res;
	}
	
	public function supprimerContact(Request $request,$pseudo){
		
		if(Session::has('utilisateur')){
			$tmp = utilisateur::where('pseudo',$pseudo)->first();

			$contact = contact::where('contact_contact_id',$tmp->utilisateur_id)->where('utilisateur_utilisateur_id',Session::get('utilisateur')->utilisateur_id)->delete();
		}
		return redirect('/contacts');
	}
	
	public function ajoutContact(Request $request,$pseudo){
		
		if(Session::has('utilisateur')){
			$tmp = utilisateur::where('pseudo',$pseudo)->first();
			$newContact = new contact;
			$newContact->utilisateur_utilisateur_id = Session::get('utilisateur')->utilisateur_id;
			$newContact->contact_contact_id = $tmp->utilisateur_id;
			$newContact->save();
		}
		return redirect('/contacts');
	}
	
}

?>