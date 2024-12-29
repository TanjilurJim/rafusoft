<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmRegister;
use App\Mail\OTPMail;
use App\Models\GeneralMessage;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha' => 'required',
        ]);

        $user_id = Str::random(25);

        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_id' => $user_id
        ]);



        $message = new GeneralMessage();
        $message->name =  $request->name;
        $message->email =  $request->email;
        $ipAddress = $request->ip();
        $message->message =  "New User Registered. User Name: $request->name  , Email: $request->email  IP Address:  $ipAddress";
        $message->save();


        event(new Registered($user));
        Auth::login($user);
        Mail::to($request->email)->send(new ConfirmRegister($user));
        return redirect(RouteServiceProvider::HOME);
    }



    public function verify ($user_id){
        $user = User::where('user_id' , $user_id)->first();
        $user->isActive = true;
        $user->save();
        return redirect('/dashboard');
    }
}
