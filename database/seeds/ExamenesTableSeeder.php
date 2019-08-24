<?php

use App\Examen;
use Illuminate\Database\Seeder;

class ExamenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Examen::class, 15)->create();
    }
}
