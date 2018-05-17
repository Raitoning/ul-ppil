<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class typetache extends Model {
    protected $table = 'typetache';
    protected $primaryKey = "idTypetache";
    public $timestamps = false;

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un typetache
        return $this->belongsToMany('ppil\models\utilisateur');
    }

    public function tache() {
        //permet de récuperer les tache associées à un typetache
        return $this->hasMany('ppil\models\tache');
    }
}