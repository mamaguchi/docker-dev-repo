<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::transaction(function() {
        DB::table('regions')->insert([
          ['name' => 'MARAN',],
          ['name' => 'JERANTUT',]]);
      });

    }
}
