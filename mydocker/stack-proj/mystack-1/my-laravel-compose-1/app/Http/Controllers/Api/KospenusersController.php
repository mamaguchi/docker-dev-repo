<?php

namespace App\Http\Controllers\Api;

use App\Kospenuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \Datetime;
use \Exception;
use App\Exceptions\OptimisticLockException;


class KospenusersController extends Controller
{
	/*
	 * Custom method to display kospenusers
	 * inside a specific location down to
	 * locality level
	 */
	public function customShowInsideLocality(Request $request)
	{
		/* Version 1: using Eloquent */
		// return DB::select('select * from kospenusers where
		// state = :state and
		// region = :region and
		// subregion = :subregion and
		// locality = :locality',
		// ['state' => $request->input('state'),
		// 'region' => $request->input('region'),
		// 'subregion' => $request->input('subregion'),
		// 'locality' => $request->input('locality')]);

		/* Version 2: using Laravel-Doctrine. using options-properties-name */
		// return DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.ic, kospenusers.name,
		// 	kospenusers.address, kospenusers.firstRegRegion,
		// 	genders.name AS gender, states.name AS state, regions.name AS region,
		// 	subregions.name AS subregion, localities.name AS locality
		// 	FROM kospenusers LEFT JOIN genders on kospenusers.fk_gender = genders.id
		// 	JOIN states on kospenusers.fk_state = states.id
		// 	JOIN regions on kospenusers.fk_region = regions.id
		// 	JOIN subregions on kospenusers.fk_subregion = subregions.id
		// 	JOIN localities on kospenusers.fk_locality = localities.id WHERE
		// 	states.name = :state and
		// 	regions.name = :region and
		// 	subregions.name = :subregion and
		// 	localities.name = :locality',
		// 	['state' => $request->input('state'),
		// 	'region' => $request->input('region'),
		// 	'subregion' => $request->input('subregion'),
		// 	'locality' => $request->input('locality')]);

		/* Version 3: using Laravel-Doctrine. using options-properties-id */
		return DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.ic, kospenusers.name,
			kospenusers.address, kospenusers.firstRegRegion,
			kospenusers.fk_gender AS gender, kospenusers.fk_state AS state, kospenusers.fk_region AS region,
			kospenusers.fk_subregion AS subregion, kospenusers.fk_locality AS locality
			FROM kospenusers WHERE
			kospenusers.fk_state = :state and
			kospenusers.fk_region = :region and
			kospenusers.fk_subregion = :subregion and
			kospenusers.fk_locality = :locality',
			['state' => $request->input('state'),
			'region' => $request->input('region'),
			'subregion' => $request->input('subregion'),
			'locality' => $request->input('locality')]);
	}

	/*
	 * Custom method to display global kospenusers
	 * outside of locality
	 */
	public function customShowOutsideLocality(Request $request)
	{
		/* Version 1: using Eloquent + QueryBuilder */
		// return DB::select('select * from kospenusers where
		// (state = :state and
		// (region != :region or
		// subregion != :subregion or
		// locality != :locality)) or
		// (state != :state2)',
		// ['state' => $request->input('state'),
		// 'region' => $request->input('region'),
		// 'subregion' => $request->input('subregion'),
		// 'locality' => $request->input('locality'),
		// 'state2' => $request->input('state')]);

		/* Version 2: using Laravel-Doctrine + QueryBuilder. using options-properties-name */
		// return DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.ic, kospenusers.name,
		// 	kospenusers.address, kospenusers.firstRegRegion,
		// 	genders.name AS gender, states.name AS state, regions.name AS region,
		// 	subregions.name AS subregion, localities.name AS locality
		// 	FROM kospenusers LEFT JOIN genders on kospenusers.fk_gender = genders.id
		// 	JOIN states on kospenusers.fk_state = states.id
		// 	JOIN regions on kospenusers.fk_region = regions.id
		// 	JOIN subregions on kospenusers.fk_subregion = subregions.id
		// 	JOIN localities on kospenusers.fk_locality = localities.id WHERE
		// 	(states.name = :state and
		// 	(regions.name != :region or
		// 	subregions.name != :subregion or
		// 	localities.name != :locality)) or
		// 	(states.name != :state2)',
		// 	['state' => $request->input('state'),
		// 	'region' => $request->input('region'),
		// 	'subregion' => $request->input('subregion'),
		// 	'locality' => $request->input('locality'),
		// 	'state2' => $request->input('state')]);

		/* Version 3: using Laravel-Doctrine + QueryBuilder. using options-properties-id */
		return DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.ic, kospenusers.name,
			kospenusers.address, kospenusers.firstRegRegion,
			kospenusers.fk_gender AS gender, kospenusers.fk_state AS state, kospenusers.fk_region AS region,
			kospenusers.fk_subregion AS subregion, kospenusers.fk_locality AS locality
			FROM kospenusers WHERE
			(kospenusers.fk_state = :state and
			(kospenusers.fk_region != :region or
			kospenusers.fk_subregion != :subregion or
			kospenusers.fk_locality != :locality)) or
			(kospenusers.fk_state != :state2)',
			['state' => $request->input('state'),
			'region' => $request->input('region'),
			'subregion' => $request->input('subregion'),
			'locality' => $request->input('locality'),
			'state2' => $request->input('state')]);

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Kospenuser::all();
		return DB::table('kospenusers')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				/* Version 1: using Eloquent */
        // return Kospenuser::create($request->only([
				// 	'ic',
				// 	'name',
				// 	'gender',
				// 	'address',
				// 	'state',
				// 	'region',
				// 	'subregion',
				// 	'locality',
				// 	'firstRegRegion']));

				/* Version 2: using QueryBuilder */
				DB::transaction(function() use($request) {

					$timestamp = new DateTime();
					$timestamp->format('Y-m-d G:i:s');

					DB::table('kospenusers')->insert([
						'ic' => $request->input('ic'),
		        'fk_gender' => $request->input('gender'),
		        'fk_state' => $request->input('state'),
						'fk_region' => $request->input('region'),
						'fk_subregion' => $request->input('subregion'),
						'fk_locality' => $request->input('locality'),
						// 'created_at' => $request->input('createDate'),
						// 'updated_at' => $request->input('updateDate'),
						'created_at' => $timestamp,
						'updated_at' => $timestamp,
						'name' => $request->input('name'),
						'address' => $request->input('address'),
						'firstRegRegion' => $request->input('firstRegRegion')]);
						});

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ic)
    {
		/* Version 1 */
        // return Kospenuser::findOrFail($ic); /*findOrFail assumes column 'id' */

		/* Version 2 */
		return DB::table('kospenusers')
		->where('ic',$ic)
		->get();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
			try {

				///////////////////////////////////////////////
				// 'try Version 1: using DI DB(database) instance //
				///////////////////////////////////////////////
				// $version = DB::table('kospenusers')
				// ->where('ic', $request->input('ic'))
				// ->first();
				// if ($version->version != $request->input('version')) {
				// 	throw new OptimisticLockException('Someone has updated the data earlier. Pls try again later');
				// } else {
				// 	app('db')->transaction(function () use ($request) {
        //
				// 		$result = DB::table('kospenusers')
				// 		->where('ic',$request->input('ic'))
				// 		->where('name', '<>','papaya')
				// 		->where('name', 'monsteraaa')
				// 		->lockForUpdate()
				// 		->increment('version');
        //
			  //   });
				// }

				///////////////////////////////////////////////////////
				// 'try' Version 2: using manual DB facade transaction //
				///////////////////////////////////////////////////////
				DB::beginTransaction();
				$version = DB::select('select version from kospenusers where name = :name for update', ['name' => 'monster'])[0];
				if ($version->version != $request->post('version')) {
					throw new OptimisticLockException('Someone has updated the data earlier. Pls try again later');
				} else {
					$result = DB::update(
						'UPDATE kospenusers set
						version = :version WHERE
						ic = :ic and
						name != :fakename and
						name = :name',
						['ic' => $request->post('ic'),
						'version' => ($version->version + 1),
						'fakename' => 'papaya',
						'name' => 'monster']);

					if ($result == 1) {
						DB::commit();
						throw new OptimisticLockException('Successfully updated kospenusers row,row updated-> '.$result);
					} else {
						DB::rollBack();
						throw new OptimisticLockException('Failed to update kospenusers row,row updated-> '.$result);
					}
				}

			} catch (OptimisticLockException $e) {
				DB::rollBack();
				return $e->getMessage();
			} catch (\Error $e) {
				DB::rollBack();
				return $e->getMessage();
			}


    }


		/**
     * For Testing
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
			$payload = $request->post('data');

			foreach ($payload as $user => $userData) {

				try {
					// $payload[$user]['status'] = 'null';
					DB::beginTransaction();
					$version = DB::select('select version from kospenusers where ic = :ic for update',
					['ic' => $payload[$user]['ic']])[0];

					if ($version->version != $payload[$user]['version']) {
						DB::rollBack();
						throw new OptimisticLockException('Someone has updated the data earlier. Pls try again later');
					} else {
						$result = DB::update(
							'UPDATE kospenusers set
							version = :version,
							name = :name WHERE
							ic = :ic',
							['ic' => $payload[$user]['ic'],
							'version' => ($version->version + 1),
							'name' => $payload[$user]['name']]);

						if ($result == 1) {
							DB::commit();
							$payload[$user]['status'] = 'successful';
						} else {
							DB::rollBack();
							$payload[$user]['status'] = 'failed';
							throw new OptimisticLockException('Failed to update kospenusers row,row updated-> '.$result);
						}
					}

				} catch (OptimisticLockException $e) {
					$payload[$user]['description'] = $e->getMessage();
				} catch (\Error $e) {
					DB::rollBack();
					$payload[$user]['description'] = $e->getMessage();
				}// end-try
			}// end-foreach

			return json_encode($payload);


    }


		/**
     * For Testing-> OutRestReqKospenusers Data Sync
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testOutRestReq(Request $request)
    {
			$payload = $request->post('data');

			foreach ($payload as $user => $userData) {

				if ($payload[$user]['status']=='UpdateServerNewKospenuser') {
					DB::beginTransaction();
					$ic = DB::select('select ic from kospenusers where ic = :ic for update',
					['ic' => $payload[$user]['ic']]);

					if (empty($ic)) {

						try {
							// DB::beginTransaction();
							$insertBoolResult = DB::insert('insert into kospenusers
								(ic, fk_gender, fk_state, fk_region, fk_subregion, fk_locality, name, address, firstRegRegion,
								created_at, updated_at) values
								(:ic, :fk_gender, :fk_state, :fk_region, :fk_subregion, :fk_locality, :name, :address, :firstRegRegion,
								:created_at, :updated_at)',
								['ic' => $payload[$user]['ic'],
					       'fk_gender' => $payload[$user]['gender'],
					       'fk_state' => $payload[$user]['state'],
								 'fk_region' => $payload[$user]['region'],
								 'fk_subregion' => $payload[$user]['subregion'],
								 'fk_locality' => $payload[$user]['locality'],
								 'name' => $payload[$user]['name'],
								 'address' => $payload[$user]['address'],
								 'firstRegRegion' => $payload[$user]['firstRegRegion'],
								 'created_at' => $payload[$user]['created_at'],
								 'updated_at' => $payload[$user]['updated_at']]);

							if (!$insertBoolResult) {
								$payload[$user]['returnStatus'] = 'INSERT_FAILED';
								DB::rollBack();
							} else {
								$payload[$user]['returnStatus'] = 'INSERT_SUCCESSFUL';
								DB::commit();
							}// end-if-inner2
						} catch (OptimisticLockException $e) {
							$payload[$user]['description'] = $e->getMessage();
						} catch (\Error $e) {
							$payload[$user]['description'] = 'Error :' . $e->getMessage();
							$payload[$user]['returnStatus'] = 'INSERT_ERROR';
							DB::rollBack();
						}// end-try

					} else {
						// $payload[$user]['returnStatus'] = 'INSERT_DENIED_ENTRY_EXISTS';

						try {
							// DB::beginTransaction();
							$data = DB::select('SELECT updated_at, version,
								fk_state, fk_region, fk_subregion, fk_locality FROM kospenusers WHERE ic = :ic for update',
							['ic' => $ic])[0];

							if ($data->updated_at > $payload[$user]['updated_at'] &&
								$data->fk_state == $payload[$user]['state'] &&
								$data->fk_region == $payload[$user]['region'] &&
								$data->fk_subregion == $payload[$user]['subregion'] &&
								$data->fk_locality == $payload[$user]['locality']) {

								$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_ANDROID_TIMESTAMP_OLDER_DATA_NEED_UPDATE';

								list($payload[$user]['version'], $payload[$user]['updated_at'], $payload[$user]['name'],
								$payload[$user]['address'], $payload[$user]['firstRegRegion'], $payload[$user]['gender']) =
								DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.name,
									kospenusers.address, kospenusers.firstRegRegion,
									kospenusers.fk_gender FROM kospenusers WHERE
									kospenusers.ic = :ic',
									['ic' => $ic]);

								DB::rollBack();
								throw new OptimisticLockException('Someone has inserted the data before you with same region.');

							} elseif ($data->updated_at > $payload[$user]['updated_at'] &&
								($data->fk_state != $payload[$user]['state'] ||
								$data->fk_region != $payload[$user]['region'] ||
								$data->fk_subregion != $payload[$user]['subregion'] ||
								$data->fk_locality != $payload[$user]['locality'])) {

								$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_ANDROID_TIMESTAMP_OLDER_DATA_NEED_DELETE_DIFFREGION';

								DB::rollBack();
								throw new OptimisticLockException('Someone has inserted the data newer than yours.');

							} elseif ($data->updated_at == $payload[$user]['updated_at']) {// This Is Quite An Impossible Situation Theoretically.
								$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_ANDROID_TIMESTAMP_SAME';
								DB::rollBack();
								throw new OptimisticLockException('Someone has inserted the data same date as yours.');
							} elseif ($data->updated_at < $payload[$user]['updated_at']) {
								$result = DB::update(
									'UPDATE kospenusers set
									version = :version,
									fk_gender = :fk_gender,
									fk_state = :fk_state,
									fk_region = :fk_region,
									fk_subregion = :fk_subregion,
									fk_locality = :fk_locality,
									name = :name,
									address = :address,
									firstRegRegion = :firstRegRegion,
									updated_at = :updated_at WHERE
									ic = :ic',
									['ic' => $payload[$user]['ic'],
									'version' => ($data->version + 1),
									'fk_gender' => $payload[$user]['gender'],
									'fk_state' => $payload[$user]['state'],
									'fk_region' => $payload[$user]['region'],
									'fk_ON_INSERT_subregion' => $payload[$user]['subregion'],
									'fk_locality' => $payload[$user]['locality'],
									'name' => $payload[$user]['name'],
									'address' => $payload[$user]['address'],
									'firstRegRegion' => $payload[$user]['firstRegRegion'],
									'updated_at' => $payload[$user]['updated_at']]);

								if ($result == 1) {
									$payload[$user]['version'] = $data->version + 1;
									$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_ANDROID_TIMESTAMP_NEWER_UPDATE_SUCCESSFUL';
									DB::commit();
								} else {
									$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_ANDROID_TIMESTAMP_NEWER_UPDATE_FAILED';
									DB::rollBack();
									throw new OptimisticLockException('Failed to update kospenusers row,row updated-> '.$result);
								}// end-if-inner3
							}// end-if-inner2
						} catch (OptimisticLockException $e) {
							$payload[$user]['description'] = $e->getMessage();
						} catch (\Error $e) {
							$payload[$user]['description'] = 'Error :' . $e->getMessage();
							$payload[$user]['returnStatus'] = 'ON_INSERT_DENIED_UPDATE_ERROR';
							DB::rollBack();
						}// end-try

						// DB::rollBack();
					}// end-if-inner

				} else {

					try {
						DB::beginTransaction();
						$data = DB::select('SELECT version, updated_at,
						fk_state, fk_region, fk_subregion, fk_locality FROM kospenusers WHERE ic = :ic for update',
						['ic' => $payload[$user]['ic']])[0];

						if ($data->version > $payload[$user]['version']) {
							// $payload[$user]['returnStatus'] = 'UPDATE_DENIED_STALE_VERSION';// Android Kospenuser Row Needs Revision.

							if ($data->updated_at > $payload[$user]['updated_at'] &&
								$data->fk_state == $payload[$user]['state'] &&
								$data->fk_region == $payload[$user]['region'] &&
								$data->fk_subregion == $payload[$user]['subregion'] &&
								$data->fk_locality == $payload[$user]['locality']) {

								$payload[$user]['returnStatus'] = 'ON_UPDATE_STALE_VERSION_ANDROID_TIMESTAMP_OLDER_DATA_NEED_UPDATE';

								list($payload[$user]['version'], $payload[$user]['updated_at'], $payload[$user]['name'],
								$payload[$user]['address'], $payload[$user]['firstRegRegion'], $payload[$user]['gender']) =
								DB::select('SELECT kospenusers.version, kospenusers.updated_at, kospenusers.name,
									kospenusers.address, kospenusers.firstRegRegion,
									kospenusers.fk_gender FROM kospenusers WHERE
									kospenusers.ic = :ic',
									['ic' => $ic]);

								DB::rollBack();
								throw new OptimisticLockException('Someone has updated the data newer than yours.');

							} elseif ($data->updated_at > $payload[$user]['updated_at'] &&
								($data->fk_state != $payload[$user]['state'] ||
								$data->fk_region != $payload[$user]['region'] ||
								$data->fk_subregion != $payload[$user]['subregion'] ||
								$data->fk_locality != $payload[$user]['locality'])) {

								$payload[$user]['returnStatus'] = 'ON_UPDATE_STALE_VERSION_ANDROID_TIMESTAMP_OLDER_DATA_NEED_DELETE_DIFFREGION';

								DB::rollBack();
								throw new OptimisticLockException('Someone has updated the data before you with different region.');

							} elseif ($data->updated_at < $payload[$user]['updated_at']) {
								$result = DB::update(
									'UPDATE kospenusers set
									version = :version,
									fk_gender = :fk_gender,
									fk_state = :fk_state,
									fk_region = :fk_region,
									fk_subregion = :fk_subregion,
									fk_locality = :fk_locality,
									name = :name,
									address = :address,
									firstRegRegion = :firstRegRegion,
									updated_at = :updated_at WHERE
									ic = :ic',
									['ic' => $payload[$user]['ic'],
									'version' => ($data->version + 1),
									'fk_gender' => $payload[$user]['gender'],
									'fk_state' => $payload[$user]['state'],
									'fk_region' => $payload[$user]['region'],
									'fk_ON_INSERT_subregion' => $payload[$user]['subregion'],
									'fk_locality' => $payload[$user]['locality'],
									'name' => $payload[$user]['name'],
									'address' => $payload[$user]['address'],
									'firstRegRegion' => $payload[$user]['firstRegRegion'],
									'updated_at' => $payload[$user]['updated_at']]);

								if ($result == 1) {
									$payload[$user]['version'] = $data->version + 1;
									$payload[$user]['returnStatus'] = 'ON_UPDATE_STALE_VERSION_ANDROID_TIMESTAMP_NEWER_UPDATE_SUCCESSFUL';
									DB::commit();
								} else {
									$payload[$user]['returnStatus'] = 'ON_UPDATE_STALE_VERSION_ANDROID_TIMESTAMP_NEWER_UPDATE_FAILED';
									DB::rollBack();
									throw new OptimisticLockException('Failed to update kospenusers row,row updated-> '.$result);
								}// end-if-inner3
							}// end-if-inner2

							// DB::rollBack();
							// throw new OptimisticLockException('Someone has updated the data earlier. Pls try again later');

						} elseif ($data->version < $payload[$user]['version']) {// This Is Quite An Impossible Situation Theoretically.
							// TO-DO
						} elseif ($data->version == $payload[$user]['version']) {
							$result = DB::update(
								'UPDATE kospenusers set
								version = :version,
								fk_gender = :fk_gender,
								fk_state = :fk_state,
								fk_region = :fk_region,
								fk_subregion = :fk_subregion,
								fk_locality = :fk_locality,
								name = :name,
								address = :address,
								firstRegRegion = :firstRegRegion,
								updated_at = :updated_at WHERE
								ic = :ic',
								['ic' => $payload[$user]['ic'],
								'version' => ($data->version + 1),
								'fk_gender' => $payload[$user]['gender'],
								'fk_state' => $payload[$user]['state'],
								'fk_region' => $payload[$user]['region'],
								'fk_subregion' => $payload[$user]['subregion'],
								'fk_locality' => $payload[$user]['locality'],
								'name' => $payload[$user]['name'],
								'address' => $payload[$user]['address'],
								'firstRegRegion' => $payload[$user]['firstRegRegion'],
								'updated_at' => $payload[$user]['updated_at']]);

							if ($result == 1) {
								$payload[$user]['version'] = $data->version + 1;
								$payload[$user]['returnStatus'] = 'UPDATE_SUCCESSFUL';
								DB::commit();
							} else {
								$payload[$user]['returnStatus'] = 'UPDATE_FAILED';
								DB::rollBack();
								throw new OptimisticLockException('Failed to update kospenusers row,row updated-> '.$result);
							}// end-if-inner2
						}// end-if-inner
					} catch (OptimisticLockException $e) {
						$payload[$user]['description'] = $e->getMessage();
					} catch (\Error $e) {
						$payload[$user]['description'] = 'Error :' . $e->getMessage();
						$payload[$user]['returnStatus'] = 'UPDATE_ERROR';
						DB::rollBack();
					}// end-try

				}// end-if-outer

			}// end-foreach

			return json_encode($payload);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ic)
    {
        return Kospenuser::destroy($ic);
    }
}
