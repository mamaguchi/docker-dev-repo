<?php

use Illuminate\Database\Seeder;
use App\Screening;


class ScreeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Screening::class, 10)->create();
    }
}
