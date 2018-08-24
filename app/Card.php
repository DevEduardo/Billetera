<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';
    protected $fillable = [
      'numero',
      'f_caducidada',
      'codigoSeguridad',
      'idUsuario'
    ];

    public static function scopeId($query, $id)
    {
    	return $query->where('idUsuario',$id)->get();
    }
}
