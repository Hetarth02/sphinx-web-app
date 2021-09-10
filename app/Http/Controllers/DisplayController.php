<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function display()
    {
        $data = DB::select('select * from questions order by timestamp desc');
        return view('home')->with('data', $data);
    }

    public function fetchuserprofile($username)
    {
        if ($username == (Auth::user()->username)) {
            return redirect('profile');
        }
        $data = DB::select('select username,course,dob from users where username = ?', [$username]);
        return view('useraccount')->with('data', $data);
    }

    public function displayquestion($qid)
    {
        $data = DB::select('select * from questions where qid = ?', [$qid]);
        $answer = DB::select('select username,answer from answers where qid = ? order by timestamp desc', [$qid]);
        array_push($data, $answer);
        return view('questionview')->with('data', $data);
    }
}
