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
  			utilisateur::where('idUtilisateur',Session::get('utilisateur')->idUtilisateur)->update(['pseudo'=> $request->pseudo,'password'=> $request->mdp,'mail'=> $request->mail, 'recevoirInvitation'=>$request->invitations,'recevoirNotif'=>$request->notif]);
			$utilisateur = utilisateur::where("idUtilisateur", Session::get('utilisateur')->idUtilisateur)->first();
			Session::put('utilisateur',$utilisateur);
			return redirect('/account');
      }
	}
	
	
}

?>