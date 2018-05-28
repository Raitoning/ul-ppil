<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\evenement;
use App\models\utilisateur;
use Illuminate\Support\Facades\DB;

class ControllerTache extends Controller
{



	public function newTask(Request $request){
		$link = $_SERVER['PHP_SELF'];
		$event = substr($link, strrpos($link, '/') + 1);
		if($request->task == "" || $request->desc == "" ){
			Session::put('erreurFormulaire','Veuillez remplir tout les champs obligatoires.');
			return view("newTask");
		}
	
		DB::table('tache')->insert(
		    ['nom' => $request->task, 'description' => $request->desc , 'valide' => '0',
				 'quantiteTotal' => '3', 'dateFin' => '2018-05-24', 'evenement_evenement_id' => $event,
				 'typetache_typetache_id' => '1']
		);
		return redirect('/event/'.$event)->with("Text","Nouvel tache créé !");

		}

		public static function getTask($event){
			$tasks = DB::table('tache')->where('evenement_evenement_id', '=', $event)->get();
			$taches = [];
      foreach($tasks as $task){
        $taches[] = $task;
      }
			return $taches ;
		}






	}






?>
