<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // dd(auth()->user());
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate(); // tạo lại id phiên
        return redirect()->intended(RouteServiceProvider::HOME);
        // $user = User::where([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ])->first();

        // if($user)
        // {
        //     Auth::login($user); // ghi nho nguoi dung hop le
        //     return redirect('/listEmployee')->with('success', 'Bạn đã đăng nhập thành công');;
        // }
        // dd(Auth::user());
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        // $this->Auth::guard('guardName')
        // $arr=['email'=> $request->email, 'password'=> $request->password];
        // dd(Auth::guard('user')->attempt($arr));
        // dd(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]));
        // $email=$request['email'];
        // $password=$request['password'];
        // if(Auth::attempt($arr)){
        //     return redirect()->intended(RouteServiceProvider::HOME);
        // }
        // else{

        // }
        // if(Auth::check()){
        //     echo 'nguoi dung da dang nhap';
        // }
        // if (Auth::guard('user')->attempt($arr)){};
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
