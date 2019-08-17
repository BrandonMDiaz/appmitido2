<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categoria::create([
        'user_id' => '2',
        'nombre' => 'Matematicas',
      ]);
      Categoria::create([
        'user_id' => '2',
        'nombre' => 'Español',
      ]);
      Categoria::create([
        'user_id' => '2',
        'nombre' => 'Ingles',
      ]);

      // factory(App\Categoria::class, 15)->create();
    }
}
