<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KospenusersStaticTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$timestamp = new DateTime();
		$timestamp->format('Y-m-d G:i:s');

      ///////////////
      // Version 1 //
      ///////////////
        // DB::transaction(function() use($timestamp){
			// DB::table('kospenusers')->insert([[
				// 'ic' => '880601105149',
				// 'created_at' => $timestamp,
				// 'updated_at' => $timestamp,
				// 'name' => 'patrick',
				// 'gender' => 'Male',
				// 'address' => 'southern park',
				// 'state' => 'PAHANG',
				// 'region' => 'MARAN',
				// 'subregion' => 'JENGKA2',
				// 'locality' => 'ULUJEMPOL',
				// 'firstRegRegion' => 'klang',],
				// [
				// 'ic' => '880601105150',
				// 'created_at' => $timestamp,
				// 'updated_at' => $timestamp,
				// 'name' => 'esther',
				// 'gender' => 'Female',
				// 'address' => 'southern park',
				// 'state' => 'PAHANG',
				// 'region' => 'MARAN',
				// 'subregion' => 'JENGKA2',
				// 'locality' => 'JENGKA6',
				// 'firstRegRegion' => 'klang',],
				// [
				// 'ic' => '000601105155',
				// 'created_at' => $timestamp,
				// 'updated_at' => $timestamp,
				// 'name' => 'romeo',
				// 'gender' => 'Male',
				// 'address' => 'southern park',
				// 'state' => 'NONPAHANG',
				// 'region' => 'MARAN',
				// 'subregion' => 'JENGKA2',
				// 'locality' => 'JENGKA6',
				// 'firstRegRegion' => 'klang',]]);
		// });


    ///////////////
    // Version 2 //
    ///////////////
		// DB::transaction(function() use($timestamp){
		// 	DB::table('kospenusers')->insert([[
		// 		'ic' => '880601105149',
		// 		'created_at' => '2018-01-30 07:00:00',
		// 		'updated_at' => '2018-01-30 07:00:00',
		// 		'name' => 'patrick',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105150',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'NONPAHANG',
		// 		'region' => 'JERANTUT',
		// 		'subregion' => 'MARAN',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105152',
		// 		'created_at' => '2018-01-30 07:00:00',
		// 		'updated_at' => '2018-01-30 07:00:00',
		// 		'name' => 'esther',
		// 		'gender' => 'FEMALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105153',
		// 		'created_at' => '2018-01-29 07:00:00',
		// 		'updated_at' => '2018-01-29 07:00:00',
		// 		'name' => 'romeo',
		// 		'gender' => 'MALE',
		// 		'address' => 'bandarputeri',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105154',
		// 		'created_at' => '2018-01-30 06:00:00',
		// 		'updated_at' => '2018-01-30 06:00:00',
		// 		'name' => 'chowta',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105155',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio3',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'JENGKA6',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105156',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio4',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'JERANTUT',
		// 		'subregion' => 'MARAN',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105157',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio5',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'MARAN',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105158',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio6',
		// 		'gender' => 'MALE',
		// 		'address' => 'bandarputeri',
		// 		'state' => 'PAHANG',
		// 		'region' => 'JERANTUT',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'ULUJEMPOL',
		// 		'firstRegRegion' => 'klang',],
		// 		[
		// 		'ic' => '880601105159',
		// 		'created_at' => '2018-01-30 08:00:00',
		// 		'updated_at' => '2018-01-30 08:00:00',
		// 		'name' => 'bellio7',
		// 		'gender' => 'MALE',
		// 		'address' => 'southernpark',
		// 		'state' => 'PAHANG',
		// 		'region' => 'MARAN',
		// 		'subregion' => 'JENGKA2',
		// 		'locality' => 'JENGKA6',
		// 		'firstRegRegion' => 'klang',]]);
		// });


    ///////////////
    // Version 3 //
    ///////////////
    DB::transaction(function() use($timestamp){
                        DB::delete('delete from kospenusers');

			DB::table('kospenusers')->insert([[
				'ic' => '880601105149',
        'fk_gender' => 1,
        'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 1,
				'created_at' => '2018-01-30 07:00:00',
				'updated_at' => '2018-01-30 07:00:00',
				'name' => 'patrick',
				'address' => 'southernpark',
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105150',
        'fk_gender' => 1,
				'fk_state' => 2,
				'fk_region' => 2,
				'fk_subregion' => 2,
				'fk_locality' => 1,
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio',
				'address' => 'southernpark',
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105152',
				'created_at' => '2018-01-30 07:00:00',
				'updated_at' => '2018-01-30 07:00:00',
				'name' => 'esther',
				'fk_gender' => 2,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105153',
				'created_at' => '2018-01-29 07:00:00',
				'updated_at' => '2018-01-29 07:00:00',
				'name' => 'romeo',
				'fk_gender' => 1,
				'address' => 'bandarputeri',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105154',
				'created_at' => '2018-01-30 06:00:00',
				'updated_at' => '2018-01-30 06:00:00',
				'name' => 'chowta',
				'fk_gender' => 1,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105155',
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio3',
				'fk_gender' => 1,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 2,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105156',
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio4',
				'fk_gender' => 1,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 2,
				'fk_subregion' => 2,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105157',
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio5',
				'fk_gender' => 1,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 2,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105158',
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio6',
				'fk_gender' => 1,
				'address' => 'bandarputeri',
				'fk_state' => 1,
				'fk_region' => 2,
				'fk_subregion' => 1,
				'fk_locality' => 1,
				'firstRegRegion' => 'klang',],
				[
				'ic' => '880601105159',
				'created_at' => '2018-01-30 08:00:00',
				'updated_at' => '2018-01-30 08:00:00',
				'name' => 'bellio7',
				'fk_gender' => 1,
				'address' => 'southernpark',
				'fk_state' => 1,
				'fk_region' => 1,
				'fk_subregion' => 1,
				'fk_locality' => 2,
				'firstRegRegion' => 'klang',]]);
		});




    }
}
