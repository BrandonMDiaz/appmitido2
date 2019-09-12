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
        'universidad_id' => '1',
        'nombre' => 'Matematicas',
      ]);
      Categoria::create([
        'universidad_id' => '1',
        'nombre' => 'Español',
      ]);
      Categoria::create([
        'universidad_id' => '1',
        'nombre' => 'Ingles',
      ]);

      // factory(App\Categoria::class, 15)->create();
    }
}
