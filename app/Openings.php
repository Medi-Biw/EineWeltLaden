<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Openings extends Model
{
	protected $primaryKey = 'id';
	public $incrementing = false;
	
	public $fillable = [
		'from_1', 'till_1', 'from_2', 'till_2', 'text', 'override', 'closed', 'two_times'
	];
}
