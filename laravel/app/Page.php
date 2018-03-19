<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   // protected $table = 'pages';

    public function creatorName(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
