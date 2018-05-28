<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\evenement;
use App\models\utilisateur;
use App\models\tache;

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

		$evenement_id = $event;
		$typetache_id = 1;
		$tache = new tache();
		$tache->nom = $request->task; // Nom de la tache (max 255char)
		$tache->description = $request->desc ; // Description de la tache (max 255char)
		$tache->quantiteTotal = 4; // SI elle est de type quentitative (max 999999)
		$tache->dateFin = '2018-5-30'; // SI elle est de type datedefin , FORMAT : 'YYYY-MM-DD' , Exemple '2018-5-17'
		$tache->evenement_evenement_id = $evenement_id;
		$tache->typetache_typetache_id = 1;

		$tache->save();
	/*	DB::table('tache')->insert(
		    ['nom' => $request->task, 'description' => $request->desc , 'valide' => '0',
				 'quantiteTotal' => '3', 'dateFin' => '2018-05-24', 'evenement_evenement_id' => $event,
				 'typetache_typetache_id' => $type]
		);
		$id_tache= DB::table('tache')->select('tache_id')->get();

		DB::table('photo_tache')->insert(
				[ 'photo_photo_id' => $id_photo, 'tache_tache_id' => $id_tache]
		);*/

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
		public static function supprimerTache(){
			$tache_id = $tache->tache_id;
      $tache = tache::where('tache_id','=',$tache_id)->first();
      $tache->delete();

		}
		public static function affecterUserTache(){
			$tache_id = $tache->tache_id;
			$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$quentite =1 ; // Quentite de contribution si on est en type avec quentite
			$tache->utilisateur()->attach($utilisateur_id,['quentite'=>$quentite]);
		}
		public static function creerText(){
			$text = new text();
			$text->texte = $request; // Le text a ajoutée ( /!\ max 255char)
			$text->save();
		}
		public static function creerPhoto(){
		$photo = new photo();
		$photo->url =$request ; // L'URL de la photo ajoutée ( /!\ max 255char)
		$photo->save();
		}
		public static function ajouterTextTache(){
			$tache_id = $tache->tache_id;
			$text_id = $text->text_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$tache->text()->attach($text_id);
		}


		public static function ajouterImageTache(){
			$tache_id = $tache->tache_id;
      $photo_id = $photo->photo_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$tache->photo()->attach($photo_id);
		}
		public static function listeParticTache(){
			$tache_id = $tache->tache_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			foreach ($tache->utilisateur as $participant) {
				// Chaque $participant correspond a un objet utilisateur etant dans la tache $tache

				// Si besoin la quentite de ce participant
				$quentiteDuParticipant = $participant->pivot->quentite;
}

		}




	}






?>
