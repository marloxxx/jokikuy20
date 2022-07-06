<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }
    public function index()
    {
        return view('pages.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(Auth::user()->role = 'admin'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('dashboard.index'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('dashboard.index'),
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.',
            ]);
        }
    }
    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect('/');
    }
}