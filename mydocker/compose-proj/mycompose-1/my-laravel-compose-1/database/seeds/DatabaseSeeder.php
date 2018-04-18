<?php

use Illuminate\Database\Seeder;
use Database\Seeds\KospenusersTableSeeder;
use Database\Seeds\ScreeningsTableSeeder;
use Database\Seeds\KospenusersStaticTableSeeder;
use Database\Seeds\GendersTableSeeder;
use Database\Seeds\StatesTableSeeder;
use Database\Seeds\RegionsTableSeeder;
use Database\Seeds\SubregionsTableSeeder;
use Database\Seeds\LocalitiesTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KospenusersTableSeeder::class);
        $this->call(ScreeningsTableSeeder::class);
        $this->call(KospenusersStaticTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(SubregionsTableSeeder::class);
        $this->call(LocalitiesTableSeeder::class);
    }
}
