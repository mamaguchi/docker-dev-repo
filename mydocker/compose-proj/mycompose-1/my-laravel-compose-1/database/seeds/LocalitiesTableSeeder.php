<?php

use Illuminate\Database\Seeder;

class LocalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::transaction(function() {
        DB::table('localities')->insert([
          ['name' => 'ULUJEMPOL',],
          ['name' => 'JENGKA6',]]);
      });

    }
}
