<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\SendMailable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function verify() 
    {
        return view('verify');
    }

    public function mail() 
    {
        $name = 'Krunal';
        Mail::to('krunal@appdividend.com')->send(new SendMailable($name));
        return redirect()->route('verify');
    }

    public function confirm(Request $request) 
    {
        $code = $request->input('varification_code');
        if ($user =  User::where('token', $code)->first()){
            $user->isActive = "Yes";
            $user->save();

            return redirect()->route('roles.create');
        } else {
            return redirect()->back();
        }
        
    }
}
