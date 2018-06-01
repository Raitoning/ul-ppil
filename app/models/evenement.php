<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;
use App\models\evenement;

class evenement extends Model {
    protected $table = 'evenement';
    protected $primaryKey = "evenement_id";
    public $timestamps = false;

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un evenement
        return $this->belongsToMany('App\models\utilisateur')->withPivot('droit');
    }

    public function tache() {
        //permet de récuperer les tache associées à un evenement
        return $this->hasMany('App\models\tache');
    }

    public function notification() {
        //permet de récuperer les notification associées à un evenement
        return $this->hasMany('App\models\notification');
    }
}
