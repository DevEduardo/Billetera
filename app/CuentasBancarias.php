<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasBancarias extends Model
{
    protected $table ='cuentasbancarias';

    protected $fillable = [
      'id',
      'pais',
      'swift',
      'numero'
    ];

    public static function scopeDni($query, $id)
    {
    	return $query->where('dni',$id)->get();
    }
}
