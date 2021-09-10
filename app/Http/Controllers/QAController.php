<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DisplayController;

class QAController extends Controller
{
    public function qsub(Request $request)
    {
        $question = $request->input('question');
        $username = Auth::user()->username;
        $datetime = new DateTime();
        DB::insert('insert into questions (username,question,timestamp) values (?, ?, ?)', [$username,$question,$datetime]);
        return redirect('home');
    }

    public function asub(Request $request, $qid)
    {
        $answers = $request->input('answer');
        $username = Auth::user()->username;
        $datetime = new DateTime();
        DB::insert('insert into answers (qid,answer,username,timestamp) values (?, ?, ?, ?)', [$qid,$answers,$username,$datetime]);
        $view = app('App\Http\Controllers\DisplayController')->displayquestion($qid);
        return response($view);
    }
}
