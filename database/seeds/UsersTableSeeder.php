<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      user::create(array(
        array(
            'username' => 'jonathan',
            'email'    => 'jonathan@admin.com',
            'name'     => 'Administrator',
            'rol'      => '1',
            'password' => Hash::make('j071dmin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ),
        array(
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'name'     => 'Administrator',
            'rol'      => '1',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ),
        array(
            'username' => 'saes',
            'email'    => 'eduardoargenis383@gmail.com',
            'name'     => 'Programador',
            'rol'      => '1',
            'password' => Hash::make('07046993') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ) // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
      ));
    }
}
