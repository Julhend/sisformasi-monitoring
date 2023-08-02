<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigitalCaliper extends Model
{
     protected $table = 'calibrasi_digital_caliper';
      protected $guarded = ['id'];
      protected $dates = ['next_cal'];

     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
