<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::transaction(function() {
        DB::table('states')->insert([
          ['name' => 'PAHANG',],
          ['name' => 'NONPAHANG',]]);
      });

    }
}
