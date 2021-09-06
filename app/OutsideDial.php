<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsideDial extends Model
{
     protected $table = 'calibrasi_outside_dial_micrometer';
      protected $guarded = ['id'];

     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
