<?php
use App\Persona;
use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Persona::create([
        'user_id' => '1',
        'preparatoria' => 'Preparatoria 9',
        'promedio' => '89.1',
      ]);

    }
}
