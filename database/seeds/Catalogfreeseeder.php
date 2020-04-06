<?php

use Illuminate\Database\Seeder;

class Catalogfreeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 0; $i <= 2; $i++){
        DB::table('catalogfrees')->insert([
            'contentid' => null,
            'episode_id' => null
        ]);
      }


    }
}
