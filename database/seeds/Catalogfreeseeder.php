<?php

use Illuminate\Database\Seeder;
use App\Catalogfree;

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
        Catalogfree::create([
            'contentid' => null,
            'episode_id' => null
        ]);
      }


    }
}
