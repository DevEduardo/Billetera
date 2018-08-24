<?php

use Illuminate\Database\Seeder;
use App\rol;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      rol::create(array(
          'name'  => 'Administrador',

      ));
    }
}
