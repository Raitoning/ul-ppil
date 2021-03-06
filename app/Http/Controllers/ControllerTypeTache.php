<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\evenement;
use App\models\utilisateur;
use App\models\typetache;
use Illuminate\Support\Facades\DB;

class ControllerTypeTache extends Controller
{



	public function newType(Request $request){
		if($request->nom == ""){
			Session::put('erreurFormulaire','Veuillez remplir tout les champs obligatoires.');
			return view("newTaskType");
		}

		$typetache = new typetache();
	$typetache->photo =$request->img ; // Le nombre de photo que doit contenir la tache (0 si aucun)
	$typetache->texte = $request->text; // Le nombre de text que doit contenir la tache (0 si aucun)
	if (isset($request->checkEnddate)) {
		$typetache->datefin = 1;// 0 pour ne pas avoir une date de fin
	}
	else {
		$typetache->datefin = 0;
	}
	if (isset($request->checkReparti)) {
		$typetache->quantite = 1; // 0 pour ne pas avoir de quentite
	}
	else {
		$typetache->quantite = 0;
	}
 // 0 pour ne pas avoir une date de fin
							// 1 pour avoir une date de fin
	$typetache->nomtypetache = $request->nom;
							 // 1 pour avoir une quentite
	$typetache->save();

	$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
	$utilisateur = utilisateur::where('utilisateur_id','=',$utilisateur_id)->first();
	$utilisateur->typetache()->attach($typetache->typetache_id);
		return redirect('/taskType');

		}

	public function modifType(Request $request, $id){
		if($request->nom == ""){
			Session::put('erreurFormulaire','Veuillez remplir tout les champs obligatoires.');
			return view("newTaskType");
		}

		if ($request->checkEnddate == null) {
			$datefin = 0;// 0 pour ne pas avoir une date de fin
		}
		else {
			$datefin = 1;
		}
		if ($request->checkReparti == null) {
			$quantite = 0; // 0 pour ne pas avoir de quantite
		}
		else {
			$quantite = 1;
		}

		typetache::where('typetache_id',$id)->update(['nomtypetache'=> $request->nom,'photo'=> $request->img,'datefin'=> $datefin, 'quantite'=>$quantite,'texte'=>$request->text,]);
		
		return redirect('/taskType');

	}


	public static function supprType($type_id){
		$type = typetache::find($type_id);
		$tmp = $type->utilisateur()->detach(Session::get('utilisateur')->utilisateur_id);
		$type->delete();

		return redirect('/taskType');
	}

		public static function getTypeTask($utilisateur){

		$nameTypeTaches =	DB::table('typetache')

			     ->select("typetache.nomtypetache","typetache.typetache_id")

			     ->join("typetache_utilisateur", "typetache_utilisateur.typetache_typetache_id",
					  "=", "typetache.typetache_id")

			      ->where("typetache_utilisateur.utilisateur_utilisateur_id", "=",$utilisateur)

			       ->get();

			$typetaches = [];
      foreach($nameTypeTaches as $nameTypeTache){
        $typetaches[] = $nameTypeTache;
      }
			return $typetaches ;
		}




	public static function getUserTypeTask(){
		
		$res = array();
		$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
		$user = utilisateur::where('utilisateur_id', '=', $utilisateur_id)->first();
		foreach ($user->typetache as $typetache) {
		    array_push($res,$typetache);
		}
		return $res;
	}

	public static function getType($type_id){
		
		return typetache::where('typetache_id','=',$type_id)->first();
	}

	}






?>
