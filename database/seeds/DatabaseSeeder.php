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
        $this->call(CountriesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(Catalogfreeseeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PlanTableSeeder::class);
    }
}
