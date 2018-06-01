<?php

namespace App\models;


use Illuminate\Database\Eloquent\Model;

class notification extends Model {
    protected $table = 'notification';
    protected $primaryKey = "notification_id";
    public $timestamps = false;

    public function evenement() {
        //permet de récuperer les evenement associées à un notification
        return $this->belongsTo('App\models\evenement');
    }

    public function utilisateur() {
        //permet de récuperer les utilisateur associées à un notification
        return $this->belongsTo('App\models\utilisateur');
    }
}
