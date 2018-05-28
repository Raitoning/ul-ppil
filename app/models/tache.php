<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class tache extends Model {
    protected $table = 'tache';
    protected $primaryKey = "tache_id";
    public $timestamps = false;

    public function typetache() {
        //permet de récuperer les typetache associées à une tache
        return $this->belongsTo('App\models\typetache');
    }

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à une tache
        return $this->belongsToMany('App\models\utilisateur')->withPivot('quantite');
    }

    public function photo() {
        //permet de récuperer les photo associées à une tache
        return $this->belongsToMany('App\models\photo');
    }

    public function text() {
        //permet de récuperer les text associées à une tache
        return $this->belongsToMany('App\models\text');
    }

    public function evenement() {
        //permet de récuperer les evenement associées à une tache
        return $this->belongsTo('App\models\evenement');
    }
}
