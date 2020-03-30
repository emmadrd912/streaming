<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('plans')->insert([
          'name' => 'Premium',
          'price' => 999,
          'stripe_plan_id' => 'plan_GyGmTtfhno9VZ8',
      ]);
    }
}
