<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\matchModel;

class StreamingController extends Controller
{
    public function index()
    {
        $streaming = matchModel::orderBy('id')->get();
        return view('admin.streaming.index')->with('streaming',$streaming);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $streaming = new matchModel;
        $streaming->title = $input['title'];
        $streaming->description = $input['description'];
        $streaming->schedule = $input['schedule'];
        $streaming->link_embed = $input['link_embed'];
        $streaming->is_live = $input['is_live'];
        $streaming->is_headline = $input['is_headline'];
        $streaming->save();
        return response()->json($streaming);
    }


    public function show(matchModel $streaming)
    {
      return response()->json($streaming);
    }

    public function edit(matchModel $streaming)
    {
        //
    }
    public function update(Request $request,  $id)
    {
        $streaming = matchModel::where('id', $id)->first();
        $input = $request->all();
        $streaming->title = $input['title'];
        $streaming->description = $input['description'];
        $streaming->schedule = $input['schedule'];
        $streaming->link_embed = $input['link_embed'];
        $streaming->is_live = $input['is_live'];
        $streaming->is_headline = $input['is_headline'];
        $streaming->save();
        return response()->json($streaming);
    }

    public function destroy(Request $request, $id)
    {
        $streaming = matchModel::where('id', $id)->first();
        $streaming->delete();
        return response()->json($streaming);
        
    }
    
}
