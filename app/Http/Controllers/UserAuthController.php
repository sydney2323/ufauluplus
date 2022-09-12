<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Session;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user_login');
    }

    public function register()
    {
        return view('user_register');
    }
    
    public function registerUser(Request $request)
    {
        request()->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'number' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required|min:5'
        ]);
        
        User::create([
            'fname' => $request['first-name'],
            'lname' => $request['last-name'],
            'number' => $request['number'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('login');
    }

    public function loginUser(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //master admin login
        $master_email = 'admin@ufauluplus.com';
        $master_password = '2022';
        
        $user = User::where('email','=',$request->email)->first();
        $admin = Admin::where('email','=',$request->email)->first();
        if ($user && Hash::check($request->password,$user->password)) {
            $request->session()->put('user',$user);
            return redirect('client');
         } else {
            if ($admin && Hash::check($request->password,$admin->password)) {
                $request->session()->put('admin',$admin);
                return redirect('admin');
             }elseif (request()->email === $master_email && request()->password === $master_password) {
                $request->session()->put('admin',[
                    'id' => 123,
                    'name' => 'master admin'
                ]);
                return redirect('admin');
             }
            return back()->with('fail','Invalid Email or Password.');
         }
       
    }

    public function logoutUser(){
        if (Session::has('user')) {
            Session::pull('user');
            return redirect('login');
        }
    }

    public function logoutAdmin(){
        if (Session::has('admin')) {
            Session::pull('admin');
            return redirect('login');
        }
    }
}