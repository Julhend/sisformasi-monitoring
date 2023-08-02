<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsideDialMicrometer extends Model
{
     protected $table = 'calibrasi_outside_dial_micrometer';
      protected $guarded = ['id'];
      protected $dates = ['next_cal'];

     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
