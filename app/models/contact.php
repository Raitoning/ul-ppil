<?php

namespace ppil\models;


use Illuminate\Database\Eloquent\Model;

class contact extends Model {
    protected $table = 'contact';
    protected $primaryKey = null;
    public $timestamps = false;

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un contact
        return $this->belongsTo('ppil\models\utilisateur');
    }
}