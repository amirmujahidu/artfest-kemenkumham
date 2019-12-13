<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tagsModel extends Model
{
    protected $table = 'tags';
	protected $primaryKey = 'id';

	public $timestamps = false;
}
