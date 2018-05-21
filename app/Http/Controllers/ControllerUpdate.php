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
		if(Session::has('utilisateur'))
			return redirect('/account');
      	else{
      		echo 'on passe dedans';
  			utilisateur::update('update utilisateur set pseudo = ?, mail = ? where idUtilisateur = ?',[$request->input('pseudo'),$request->input('mail'),Session::get('utilisateur')->idUtilisateur]);
  			echo 'ca marche';			
      }
	}	 
}

?>