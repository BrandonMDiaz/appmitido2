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
      'tipo' => 1,
      'email_verified_at' => now(),
      'password' => bcrypt('12345678'),
      'remember_token' => Str::random(10),
    ]);

    User::create([
      'name' => 'Omar',
      'email' => 'omar@gmail.com',
      'tipo' => 0,
      'email_verified_at' => now(),
      'password' => bcrypt('12345678'),
      'remember_token' => Str::random(10),
    ]);
    // factory(App\User::class, 15)->create();
  }
}
