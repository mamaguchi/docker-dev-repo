<?php

namespace App\Http\Controllers\Api;

use App\Screening;
use App\Kospenuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ScreeningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Screening::all();
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
		/* Version 1 */
		// $kospenuser = Kospenuser::where('name', $request->only('name'))->get()->first();
        // $screening = new Screening($request->only('bp'));
		// $screening->kospenuser()->associate($kospenuser);
		// $screening->save();

		/* Version 2 */
        $screening = new Screening($request->only([
			'fk_ic',
			'date',
			'weight',
			'height',
			'systolic',
			'diastolic',
			'dxt',
			'smoker',
			'sendToServer']));
		$screening->save();
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
        // return Screening::findOrFail($id); /*findOrFail assumes column 'id' */

		/* Version 2 */
		return DB::table('screenings')
		->where('fk_ic',$ic)
		->take(1)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Screening::destroy($id);
    }


    /**
     * For Testing-> Screenings Data Sync
     */
    public function testScreeningSync(Request $request)
    {
      $payload = $request->post('data');

      foreach ($payload as $screening => $screeningData) {
        DB::beginTransaction();

        try {
          $insertBoolResult = DB::insert('insert into screenings
            (fk_ic, date, weight, height, systolic, diastolic, dxt, smoker) values
            (:fk_ic, :date, :weight, :height, :systolic, :diastolic, :dxt, :smoker)',
            ['fk_ic' => $payload[$screening]['ic'],
             'date' => $payload[$screening]['created_at'],
             'weight' => $payload[$screening]['weight'],
             'height' => $payload[$screening]['height'],
             'systolic' => $payload[$screening]['systolic'],
             'diastolic' => $payload[$screening]['diastolic'],
             'dxt' => $payload[$screening]['dxt'],
             'smoker' => $payload[$screening]['smoker']]);

          if (!$insertBoolResult) {
            $payload[$screening]['returnStatus'] = 'INSERT_FAILED';
            DB::rollBack();
          } else {
            $payload[$screening]['returnStatus'] = 'INSERT_SUCCESSFUL';
            DB::commit();
          }// end-if-inner
        } catch (OptimisticLockException $e) {
          $payload[$screening]['description'] = $e->getMessage();
        } catch (\Error $e) {
          $payload[$screening]['description'] = 'Error :' . $e->getMessage();
          $payload[$screening]['returnStatus'] = 'INSERT_ERROR';
          DB::rollBack();
        }// end-try
      }// end-foreach

      return json_encode($payload);
    }



}
