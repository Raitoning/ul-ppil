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
		$contacts = contact::where('utilisateur_id', '=', $utilisateur_id )->get();
		foreach ($contacts as $contact) {
			$userContact = utilisateur::where('utilisateur_id', '=', $contact->contact_id)->first();
			array_push($res,$userContact->pseudo);
		}
			
		return $res;
	}
	
	public static function getUtilisateurs(){
			
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		
		$tmp = array($utilisateur_id);
		
		$contacts = contact::where('utilisateur_id', '=', $utilisateur_id )->get();
		foreach ($contacts as $contact) {
			array_push($tmp,$contact->contact_id);
		}

		$pascontact = utilisateur::whereNotIn('utilisateur_id', $tmp)->get();
		$res = array();
		foreach ($pascontact as $utilisateurNonContact) 
			array_push($res,$utilisateurNonContact->pseudo);
		
		return $res;
	}
	
}

?>