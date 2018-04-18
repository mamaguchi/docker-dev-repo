<?php

use Illuminate\Database\Seeder;

class SubregionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::transaction(function() {
        DB::table('subregions')->insert([
          ['name' => 'JENGKA2',],
          ['name' => 'MARAN',]]);
      });

    }
}
