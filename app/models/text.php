<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class text extends Model {
    protected $table = 'text';
    protected $primaryKey = "idText";
    public $timestamps = false;

    public function tache() {
        //permet de récuperer les tache associées à un text
        return $this->belongsToMany('ppil\models\tache');
    }
}