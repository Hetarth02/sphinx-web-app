<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    public function forgotpassword(Request $request)
    {
        //$email = $request->email;
        //$username = $request->username;
        // $email = 'abc@gmail.com';
        // $username = 'abc';
        // $new_password = Str::random(10);
        // $crypt_new_password = bcrypt($new_password);
        //comment

        $to_name = 'Hetarth';
        $to_email = 'hetarth02@gmail.com';
        $data = array('name'=>"Sphinx", "body" => "A test mail");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Laravel Test Mail');
            $message->from('sphinxlaravel@gmail.com','Test Mail');
        });

        // $insert = DB::insert('insert into users password,password_values values ?,? where email = ? and username = ?', [$crypt_new_password,$new_password,$email,$username]);
        // if ($insert) {
        //     return response('Success');
        // } else {
        //     return response('Failed');
        // }

        //return response([$new_password, $crypt_new_password]);
    }
}
