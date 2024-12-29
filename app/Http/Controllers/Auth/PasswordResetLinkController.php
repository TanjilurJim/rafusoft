<?php

namespace App\Http\Controllers\Auth;

use App\Mail\OTPMail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required'],
        ]);


        $email = $request->input('email');

        
        $validator->after(function ($validator) use ($request) {
            $email = $request->input('email');
            $domain = '@rafusoft.com';

            if (strpos($email, $domain) !== false) {
                $validator->errors()->add('email', 'Please use secondary email.');
            }
        });

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $randomNumber = rand(100000, 999999);

        
        Mail::to($email)->send(new OTPMail($randomNumber));

        session(['email' => ['value' => $email, 'expires' => now()->addMinutes(5)]]);
        session(['otp' => ['value' => $randomNumber, 'expires' => now()->addMinutes(5)]]);


        return redirect('/verify-otp')->with('success', 'Email sent successfully!');
    }







    public function verify() {
        $otp = session('otp.value');
        $expires = session('otp.expires');
    
        if ($otp && $expires && now()->lt($expires)) {
            return view('auth.verify');
        } else {
            return view('error.403');
        }
    }


    public function check(Request $request) {
        $otp = session('otp.value');
        $user_otp = $request->input('otp');
        if ($otp == $user_otp) {
            session(['user_otp' => ['value' => $user_otp, 'expires' => now()->addMinutes(5)]]);
            return redirect('set-new-password');
        }else{
            return redirect()->back()->with('error', "OTP Doesn't Match");
        }
    }




        public function new_password () {
            $expires = session('otp.expires');
            $otp = session('otp.value');
            $user_otp = session('user_otp.value');
    
        if ($otp == $user_otp && $expires && now()->lt($expires)) {
            return view('auth.newpassword');
        } else {
            return view('error.403');
        }
    }
        public function store_password (Request $request) { 
            $expires = session('otp.expires');
            $otp = session('otp.value');
            $user_otp = session('user_otp.value');
            $email = session('email.value');

            $password = $request->input('password');
            $repassword = $request->input('repassword');

            $user = User::where('email', $email)
            ->orWhere('s_email', $email)
            ->first();


            if ($otp == $user_otp && $expires && now()->lt($expires)) {
                if($password == $repassword){
                    $user->password = Hash::make($password);
                    $user->save();
                    return redirect('/login')->with('success', "Password  Reset Successfull");
                }
            } else {
                return view('error.403');
            }
    }

}
