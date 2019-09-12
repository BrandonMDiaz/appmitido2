<?php

use App\SubCategoria;
use Illuminate\Database\Seeder;

class SubCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '1',
        'nombre' => 'Fracciones',
      ]);

      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '1',
        'nombre' => 'Logica',
      ]);

      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '1',
        'nombre' => 'Divisiones',
      ]);


      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '2',
        'nombre' => 'Gramatica',
      ]);
      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '2',
        'nombre' => 'Conjugacion',
      ]);
      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '2',
        'nombre' => 'Lecturas',
      ]);


      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '3',
        'nombre' => 'Grammar',
      ]);
      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '3',
        'nombre' => 'Reading',
      ]);
      SubCategoria::create([
        'universidad_id' => '1',
        'categoria_id' => '3',
        'nombre' => 'Conjugations',
      ]);


      // factory(App\SubCategoria::class, 15)->create();

    }
}
