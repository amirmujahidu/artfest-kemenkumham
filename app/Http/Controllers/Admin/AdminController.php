<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {
	    $total["video"] = \App\matchModel::whereNotNull('link_embed')->count();
	    return view('admin.index')->with('total',$total);
	}
}
