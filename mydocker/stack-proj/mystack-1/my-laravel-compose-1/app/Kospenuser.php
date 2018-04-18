<?php

namespace App;

use App\Screening;
use Illuminate\Database\Eloquent\Model;

class Kospenuser extends Model
{
    /**
	* @var array
	*/
	protected $primaryKey = 'ic';
	public $incrementing = false;
	protected $keyType = 'string';

  protected $fillable = ['version','ic','fk_gender','fk_state','fk_region','fk_subregion','fk_locality','created_at','updated_at','name','address','firstRegRegion',];

	protected $visible = [
		'version',
		'ic',
		'fk_gender',
		'fk_state',
		'fk_region',
		'fk_subregion',
		'fk_locality',
		'created_at',
		'updated_at',
		'name',
		'address',
		'firstRegRegion',];

	// Stored as different type in db, but casted
	// to another upon read and write.
	protected $cast = [
	'created_at' => 'string',
	'updated_at' => 'string',
	'fk_gender' => 'string',
	'fk_state' => 'string',
	'fk_region' => 'string',
	'fk_subregion' => 'string',
	'fk_locality' => 'string',];

	/**
	* @var array
	*/
	//protected $hidden = [];

	public function screenings() {
		return $this->hasMany(Screening::class);
	}
}
