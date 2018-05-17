<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class evenement extends Model {
    protected $table = 'evenement';
    protected $primaryKey = "idEvenement";
    public $timestamps = false;

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un evenement
        return $this->belongsToMany('ppil\models\utilisateur');
    }

    public function tache() {
        //permet de récuperer les tache associées à un evenement
        return $this->hasMany('ppil\models\tache');
    }

    public function notification() {
        //permet de récuperer les notification associées à un evenement
        return $this->hasMany('ppil\models\notification');
    }
}