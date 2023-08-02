<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadGauge extends Model
{
     protected $table = 'calibrasi_thread_gauge';
      protected $guarded = ['id'];
      protected $dates = ['next_cal'];

     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
