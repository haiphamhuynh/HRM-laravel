<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function showlogin(){
        return view('login.index');
    }
    public function forgotPassword(){
        return view('login.forgotpassword');
    }
    public function resetPassword(){
        return view('login.reset_password');
    }
    public function putResetPassword(Request $request){
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $password = User::where('email', '=', 'phhai1603@gmail.com')
                    ->update([
                        'password' => $request -> input('password_confirmation')
                    ]);
        return view('login.index');
    }
    public function postForgotPassword(Request $request){
        $request->validate([
            'email' => 'required|exists:users'
        ],[
            'email.required' => 'vui long nhap dia chi email hop le',
            'email.exists' => 'email nay khong ton tai trong he thong'
        ]);
        $token = strtoupper(Str::random(10));
        $users = User::where('email', $request->email)->first();
        $users->update(['token'=>$token]);

        Mail::send('login.forgot', compact('users'),function($email) use($users){
            $email->subject('lay lai mat khau tai khoan');
            $email->to($users->email);
        });
        return redirect()->back('login.index')->with('yes', 'vui long check email de thu vien thay doi mat khau');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $arr=['email'=> $request->email, 'password'=> $request->password];
        $email=$request['email'];
        $password=$request['password'];
        if(Auth::attempt($arr)){ // Auth::attempt trả về false hoặc true khi so sanh
            return redirect('/home');
        }
        else{
            dd(Auth::attempt($arr));
        }
    }
    public function index(){
        // return 'Hello';
        return view('home');
    }
}
