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

      //Permet de se créer en Admin (change tes données)
      DB::table('users')->insert([
          'id' => 1,
          'name' => 'Lucas',
          'email' => 'lucasdu33@gmail.com',
          'password' => bcrypt('toortoor'),
      ]);
      DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
      ]);
    }
}
