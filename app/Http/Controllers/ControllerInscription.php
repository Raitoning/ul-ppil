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
			
			if()
			
			$newUser = new utilisateur;
			$newUser->pseudo = $request->pseudo
			$newUser->password = $request->
			
			
			$newUser->save();
			
			return redirect('/')->with("Text","Inscription réussite");
		}
		
	}
}

?>