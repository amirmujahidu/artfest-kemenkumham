<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matchModel extends Model
{
    protected $table = 'matches';
	protected $primaryKey = 'id';

	public $timestamps = false;
}
