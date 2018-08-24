<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'rol', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeName($query, $name)
    {
      if (trim($name) !=''  ) {
        $query->where('users.name','LIKE', "%$name%");
      }
    }

    public function scopeConfir($query)
    {
        $query->where('status',0);
    }

    public static function FilterAndPginate($name, $code)
    {
      return User::Name($name)
                  ->code($code)
                  ->paginate(10);
    }

    public function scopeId($query, $id){
      return $query->where('dni',$id)->first();
    }

}
