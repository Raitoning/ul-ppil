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
use App\models\photo;
use App\models\typetache;

use Illuminate\Support\Facades\DB;

class ControllerTache extends Controller
{




	public function newTask(Request $request){
		$link = $_SERVER['PHP_SELF'];
		$event = substr($link, strrpos($link, '/') + 1);
	//	$task = substr($link, strrpos($link, '/') + 2);
		if($request->task == "" || $request->desc == "" ){
			Session::put('erreurFormulaire','Veuillez remplir tout les champs obligatoires.');
			return view("newTask");
		}

		$evenement_id = $event;
		$typetache_id = 1;

		$tache = new tache();
		$tache->nom = $request->task; // Nom de la tache (max 255char)
		$tache->description = $request->desc ; // Description de la tache (max 255char)
		$tache->quantiteTotal = $request->quantity; // SI elle est de type quentitative (max 999999)
		$tache->dateFin = '2018-5-30'; // SI elle est de type datedefin , FORMAT : 'YYYY-MM-DD' , Exemple '2018-5-17'
		$tache->evenement_evenement_id = $evenement_id;
		$tache_id=$_POST['typetache'];
		$tache->typetache_typetache_id =$tache_id ;

		$tache->save();

	//	$this->getTaskId($tache);

		return redirect('/event/'.$event)->with("Text","Nouvel tache créé !");

		}

		public static function getTaskInfo($tache_id){
			$task = tache::where('tache_id',$tache_id)->first();
			return $task;
		}


		public static function getTask($event){
			$tasks = DB::table('tache')->where('evenement_evenement_id', '=', $event)->get();
			$taches = [];
      foreach($tasks as $task){
        $taches[] = $task;
      }
			return $taches ;
		}
		public static function supprimerTache($tache){
			$tache_id = $tache->tache_id;
      $tache = tache::where('tache_id','=',$tache_id)->first();
      $tache->delete();

		}
		public static function affecterUserTache($tache){
			$tache_id = $tache->tache_id;
			$utilisateur_id = Session::get('utilisateur')->utilisateur_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$quantite = 0; // Quentite de contribution si on est en type avec quentite
			$tache->utilisateur()->attach($utilisateur_id,['quantite'=>$quantite]);
		}
		public static function creerText(){
			$text = new text();
			$text->texte = $request; // Le text a ajoutée ( /!\ max 255char)
			$text->save();
		}
		public static function creerPhoto(){
		$photo = new photo();
		$photo->url ='salusaluttest' ; // L'URL de la photo ajoutée ( /!\ max 255char)
		$photo->save();
		}
		public static function ajouterTextTache( $tache,$text){
			$tache_id = $tache->tache_id;
			$text_id = $text->text_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$tache->text()->attach($text_id);
		}


		public static function ajouterImageTache($tache,$nvPhoto){
			$tache_id = $tache->tache_id;
      $photo_id = $nvPhoto->photo_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$tache->photo()->attach($photo_id);
		}

		public static function listeParticTache($tache){
			$tache_id = $tache->tache_id;
			$tache = tache::where('tache_id','=',$tache_id)->first();
			$liste = [];
			foreach ($tache->utilisateur as $participant) {
				// Chaque $participant correspond a un objet utilisateur etant dans la tache $tache
				// Si besoin la quentite de ce participant
				$liste[]= $participant;
				$quentiteDuParticipant = $participant->pivot->quentite;
			}
			return $liste;
		}

		public function modifierTache(Request $request, $id){

			$event = tache::where('tache_id',$id)->first();

			if((strtotime($event->dateDebut) != strtotime($request->dateDeb)) && strtotime($event->dateDebut) < time()-(1 * 23 * 58 * 60) ){
				Session::put('erreurInscription','La date de début ne peut être modifiée, l\'événement à déjà commencé.');
				return redirect("event/modifEvent/".$id);
			}

			if(strtotime($event->dateDebut) != strtotime($request->dateDeb) ){
				if( strtotime($request->dateDeb) < time()-(1 * 23 * 58 * 60)){
					Session::put('erreurInscription','La date de début ne doit pas être dépassée.');
					return redirect("event/modifEvent/".$id);
				}
			}

			if(! is_null($request->dateFin)){
				if( strtotime($request->dateDeb) > strtotime($request->dateFin)){
					Session::put('erreurInscription','La date de fin est anterieur à la date de début.');
					return redirect("event/modifEvent/".$id);
				}
				if( strtotime($event->dateFin) != strtotime($request->dateFin) && strtotime($request->dateFin) < time()-(1 * 23 * 58 * 60)){
					Session::put('erreurInscription','La date de fin ne doit pas être dépassée.');
					return redirect("event/modifEvent/".$id);
				}
			}

			if($request->suppr == null){
				$suppr = false ;
			}else{
				$suppr = true ;
			}

			if($request->genre == "Privé"){
				$genre = false;
			}else{
				$genre = true;
			}

			evenement::where('evenement_id',$id)->update(['intitule'=> $request->name,'dateDebut'=> $request->dateDeb,'dateFin'=> $request->dateFin, 'suppressionAutomatique'=>$suppr,'public'=>$genre, 'description'=> $request->desc, "lieu"=> $request->lieu]);

				return redirect('/event/'.$id);
		}


		public static function formulaire(Request $request){
			$tmp = typetache::where('typetache_id','=',$request->typetache)->first();
			return view('newTask',['type' => $tmp,'event' => $request->ev]);
		}

	}






?>
