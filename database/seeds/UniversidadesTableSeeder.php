<?php

use App\Universidad;
use Illuminate\Database\Seeder;

class UniversidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Universidad::create([
        'user_id' => '2',
        'nombre' => 'UdG',
        'ubicacion' => 'Volcan Cofre de Perote',
      ]);
    }
}
