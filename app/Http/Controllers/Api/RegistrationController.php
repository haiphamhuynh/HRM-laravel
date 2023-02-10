<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //private $email;
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $users_list =  User::all();
        return response()->json(['User_list' => $users_list, 'message' => 'Resigen Success'], 201);
    }
    public function forgot(Request $request)
    {
        $emailclient = $request->email;
        $emailserve = User::where('email', $emailclient)->first();
        if ($emailserve) {
            $ps = User::where('email', $emailclient)->first();
            return response()->json(['messenger' => 'Success', 'email' => $emailclient, 'password' =>  $ps], 200);
        } else {
            return response()->json(['messenger' => 'Faile'], 200);
        }
    }

    public function reset_password(Request $request)
    {
        $emailReset = $request->emailreset;
        $usercheck = User::where('email', $emailReset)->first();
        if ($usercheck) {
            $userUpdate = User::where('email', $emailReset)->update([
                'password' => Hash::make($request->data),
            ]);
            return response()->json(['messenger' => 'Success', 'emailReset' => $userUpdate], 200);
        }else{
            return response()->json(['messenger' => 'Faile', 'emailReset' => $emailReset], 200);
        }
    }
}
