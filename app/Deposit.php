<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{

  protected $table = 'deposits';
  protected $fillable =[
    'user',
    'money',
    'bank',
    'quantity',
    'date'
  ];

  public function scopeSaldo($query, $id){
    return $query->where('user',$id)->sum('quantity');
  }

}
