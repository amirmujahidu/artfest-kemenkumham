<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
	use SoftDeletes;

    protected $connection = 'artfest';
    protected $table = 'votes';
}
