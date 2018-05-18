<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class photo extends Model {
    protected $table = 'photo';
    protected $primaryKey = "idPhoto";
    public $timestamps = false;

    public function tache() {
        //permet de récuperer les tache associées à un photo
        return $this->belongsToMany('ppil\models\tache');
    }
}