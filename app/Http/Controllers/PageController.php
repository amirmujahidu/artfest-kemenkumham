<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
    	$schedule = \App\matchModel::select('schedule')->whereNotNull('schedule')->groupBy('schedule')->get();
    	$pertandingan = \App\matchModel::whereNotNull('schedule')->get();
    	$headline = \App\matchModel::where('is_headline','1')->get();
    	$matches = \App\matchModel::whereNotNull('link_embed')->orderBy('is_live','desc')->orderBy('id','desc')->take(6)->get();
    	return view('index',['matches'=>$matches, 'headline'=>$headline, 'schedule'=>$schedule, 'pertandingan'=>$pertandingan]);
    }

    public function pertandingan(Request $request){
    	if ($request->has('q')){
            $pertandingan = \App\matchModel::whereNotNull('link_embed')
            	->where('title','like','%'.$request->q.'%')
                ->orwhere('description','like','%'.$request->q.'%')
                ->orderby('schedule','desc')->get();
        }else{
            $pertandingan = \App\matchModel::whereNotNull('link_embed')->orderby('schedule','desc')->get();
            
        }
        $schedule = \App\matchModel::select('schedule')->whereNotNull('schedule')->groupBy('schedule')->get();
    	$pertandingans = \App\matchModel::whereNotNull('schedule')->get();
        $tags = \App\tagsModel::get();
    	return view('pertandingan')->with('pertandingan',$pertandingan)->with('q',$request->q)->with('pertandingans',$pertandingans)->with('schedule',$schedule)->with('tags',$tags);
    }

    public function pertandinganDetail($id){
    	$recent = \App\matchModel::whereNotIn('id',[$id])->whereNotNull('link_embed')->orderBy('id','desc')->take(3)->get();
    	$pertandingan = \App\matchModel::where('id',$id)->first();
    	return view('pertandingan-detail')->with('pertandingan',$pertandingan)->with('recent',$recent);
    }
}
