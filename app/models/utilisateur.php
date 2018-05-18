<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;
use App\models\utilisateur;

class utilisateur extends Model {
    protected $table = 'utilisateur';
    protected $primaryKey = "idUtilisateur";
    public $timestamps = false;
	
    public function evenement() {
        //permet de récuperer les evenement associées à un utilisateur
        return $this->belongsToMany('App\models\evenement')->withPivot('droit');
    }

    public function tache() {
        //permet de récuperer les tache associées à un utilisateur
        return $this->belongsToMany('App\models\tache')->withPivot('quentite');
    }

	public function typetache() {
        //permet de récuperer les typetache associées à un utilisateur
        return $this->belongsToMany('App\models\typetache');
    }

    public function notification() {
        //permet de récuperer les notification associées à un utilisateur
        return $this->hasMany('App\models\notification');
    }

}