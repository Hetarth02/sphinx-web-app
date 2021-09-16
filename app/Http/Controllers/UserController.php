<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function checkuserdetails(Request $request)
    {
        $data = array(
            'username' => $request->input('username'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('home');
        }
        return redirect('/');
    }

    public function adduserdetails(Request $request)
    {
        $email = $request->email;
        $username = $request->username;
        $password = bcrypt($request->password);
        $password_value = $request->password;
        $dob = $request->dob;
        $gender = $request->gender;
        $course = $request->course;

        try {
            DB::insert('insert into users (email,username,password,password_values,dob,gender,course) values (?,?,?,?,?,?,?)', [$email,$username,$password,$password_value,$dob,$gender,$course]);
            return redirect('/');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function displayuserdata()
    {
        if (empty(Auth::user()->username)) {
            return redirect('/');
        }
        $username = Auth::user()->username;
        $data = DB::select('select username,course,dob from users where username = ?', [$username]);
        return view('account')->with('data', $data);
    }
}
