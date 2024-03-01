<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Ichtrojan\Otp\Otp;

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
            'username' => ['required', 'string', 'unique:'.User::class],
            'address' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        $otp    =   (new Otp)->generate($request->username, 'numeric', 6, 15);
        
        event(new Registered($user));
        
        return redirect(RouteServiceProvider::OTP.'/'.Crypt::encryptString($request->username));
        
        // Auth::login($user);

        // return redirect(RouteServiceProvider::USER);
    }

    public function confirmOtpVerification(Request $request){

        $user   =   User::where('username',$request->username)->first();

        if($user->is_phone_verified == '0'){
            
            $status =   (new Otp)->validate($request->username, $request->otp);
            
            if ($status->status == false) {
                
                return redirect()->back()->withErrors(['otp' => 'Please enter valid OTP.']);   
            }

            $user->is_phone_verified = '1'; // Assuming is_phone_verified is a boolean field
            $user->save();

            Auth::login($user);

            return redirect(RouteServiceProvider::USER);
        }
    }
}
