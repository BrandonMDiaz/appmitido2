<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UniversidadesTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(SubCategoriasTableSeeder::class);
        $this->call(ExamenesTableSeeder::class);
        $this->call(PreguntasTableSeeder::class);
        $this->call(TutorialesTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
    }
}
