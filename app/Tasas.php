<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasas extends Model
{
    protected $table ='tasas';


    public function scopeMoneda2($query, $moneda, $moneda2)
    {
      return $query->select('tasa')->where([
        ['moneda2',$moneda],
        ['moneda1',$moneda2],
        ])->get();
    }
}
