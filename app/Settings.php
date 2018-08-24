<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table ='settingsuser';

    protected $filable = [
      'user'
    ];

    public function scopeId($query, $id){
      return $query->where('user',$id)->first();
    }
}
