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
        'name' => 'UdG',
        'email' => 'udg@gmail.com',
        'logo' => 'holi',
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
      ]);
    }
}
