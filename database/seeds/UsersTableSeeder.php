<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    User::create([
      'name' => 'Brandon',
      'email' => 'brandon@gmail.com',
      'preparatoria' => 'Preparatoria 9',
      'promedio' => 98.5,
      'examen' => 0,
      'email_verified_at' => now(),
      'password' => bcrypt('12345678'),
      'remember_token' => Str::random(10),
    ]);
    // factory(App\User::class, 15)->create();
  }
}
