<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\models\utilisateur;
use App\models\evenement;

class ControllerParticipants extends Controller
{
    public static function getParticipants($event_id){
		$event = evenement::where('evenement_id',$event_id)->first();
		
	    $utilisateurs = $event->utilisateur;
		return $utilisateurs;
    }
}

?>
