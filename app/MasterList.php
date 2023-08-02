<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterList extends Model
{
     protected $table = 'masterlist';
      protected $guarded = ['id'];
      protected $dates = ['next_cal'];

     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
