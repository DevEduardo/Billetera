<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasasUser extends Model
{
    protected $table='tasasuser';
    protected $fillable = [
      'tasa',
      'abreviatura',
      'dni'
    ];

    public function scopeUser($query, $user)
    {
      return $query->where('dni',$user)->get();
    }
}
