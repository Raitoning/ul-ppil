<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class typetache extends Model {
    protected $table = 'typetache';
    protected $primaryKey = "typetache_id";
    public $timestamps = false;

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un typetache
        return $this->belongsToMany('App\models\utilisateur');
    }

    public function tache() {
        //permet de récuperer les tache associées à un typetache
        return $this->hasMany('App\models\tache');
    }
}
