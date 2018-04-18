<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::transaction(function() {
        DB::table('genders')->insert([
          ['name' => 'MALE',],
          ['name' => 'FEMALE',]]);
      });

    }
}
