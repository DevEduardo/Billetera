<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'moneda';

    protected $filable = ['signo','pais','abreviatura'];


}
