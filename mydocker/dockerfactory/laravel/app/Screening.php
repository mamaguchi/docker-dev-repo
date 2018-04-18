<?php

namespace App;

use App\Kospenuser;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    /**
	* @var array
	*/
    protected $fillable = [
	'fk_ic',
	'date',
	'weight',
	'height',
	'systolic',
	'diastolic',
	'dxt',
	'smoker'];

	public $timestamps=false;

	// Stored as different type in db, but casted
	// to another upon read and write.
	//protected $cast = [];

	// '$touches' allow any update to 'Screening'
	// model to automatically update parent model
	// 'kospenuser' 'updated_at' column in db.


	public function kospenuser() {
		return $this->belongsTo(Kospenuser::class);
	}
}
