<?php

use Illuminate\Database\Seeder;
use App\Kospenuser;
use Illuminate\Support\Facades\DB;


class KospenusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
        factory(Kospenuser::class, 3)->create();
		
    }
}
