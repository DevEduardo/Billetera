<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table ='transfers';

    public function scopeUser($query, $id){
      return $query->where('user',$id)->limit(5)->get();
    }

    public function scopeUserAll($query, $id){
        return $query->where('user',$id)->paginate(10);
    }

    public function scopeEmail($query){
        return $query->select('emailB')->get();
    }

}
