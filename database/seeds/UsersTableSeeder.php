<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $admin = Role::where('name', 'admin')->first();
      $free = Role::where('name', 'free')->first();
      $premium = Role::where('name', 'premium')->first();

      DB::table('users')->insert([
          'name' => 'Emma',
          'email' => 'emmadrd912@gmail.com',
          'password' => bcrypt('toortoor'),
      ]);
    }
}
