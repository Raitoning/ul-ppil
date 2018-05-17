<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model {
    protected $table = 'utilisateur';
    protected $primaryKey = "idUtilisateur";
    public $timestamps = false;

    public function evenement() {
        //permet de récuperer les evenement associées à un utilisateur
        return $this->belongsToMany('ppil\models\evenement');
    }

    public function tache() {
        //permet de récuperer les tache associées à un utilisateur
        return $this->belongsToMany('ppil\models\tache');
    }

	public function typetache() {
        //permet de récuperer les typetache associées à un utilisateur
        return $this->belongsToMany('ppil\models\typetache');
    }

    public function notification() {
        //permet de récuperer les notification associées à un utilisateur
        return $this->hasMany('ppil\models\notification');
    }

}