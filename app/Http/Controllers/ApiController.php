<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\Vote;

class ApiController extends Controller
{
    public function checkCookie(){
        /* Check a cookie */
        $isVote = Cookie::get('id_voter');
        $period = 60; //1 minute

        if($isVote){
            $idVoter = $isVote; 
            return (new Response())->withCookie(cookie('id_voter', $idVoter, $period));
        }
        else{
            return (new Response());
        }         
    }

    public function vote(Request $request){
        $idMatch = $request->input('id_match');
        $cookie = $request->input('id_voter');

        try {
            $vote = new Vote();
            $vote->id_match = $idMatch;
            $vote->cookie = $cookie;
            $vote->ip_address = request()->ip();

            $vote->save();

            $response = array(
                "isSuccess" => true,
                "message"   => 'Vote berhasil',
                "title"     => 'Berhasil!'
            );

        } catch (Exception $e) {
            $response = array(
                "isSuccess" => false,
                "message"   => 'Vote Gagal!',
                "title"     => 'Gagal!'
            );
        }

        return response()->json($response);
    }

    public function setCookie(Request $request)
    {
        $idVoter = Cookie::get('id_voter');
        if($idVoter == null){
            $period = 60;
            $idVoter = round(microtime(true) * 1000);

            return (new Response())->withCookie(cookie('id_voter', $idVoter, $period));
        }
    }
}



