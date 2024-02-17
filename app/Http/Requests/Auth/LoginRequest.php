<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use LdapRecord\Container;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'password' => 'required|string',
            'username' => 'required|string',
        ];

        return $rules;
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void{

        $this->ensureIsNotRateLimited();

        if( User::where('username', $this->input('username'))->first() ){
            
            if (! Auth::attempt(['username' => $this->input('username'), 'password' => $this->input('password') ])) {

                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'username' => trans('auth.failed'),
                ]);
            }

        }else{
            
            try {

                $this->validateLdapRegisterUser($this->input('username'), $this->input('password'));
                Auth::attempt(['username' => $this->input('username'), 'password' => $this->input('password')]);

            } catch (\Exception $e) {

                // In case user not registered
                throw ValidationException::withMessages([
                    'username' => trans('auth.failed') . '-' . $e->getMessage(),
                ]);
            }
        }
        
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'phone' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }

    public function validateLdapRegisterUser( String $username, String $password ){

        // $connection = Container::getConnection('default');
        
        if((Container::getConnection('default'))->query()->findBy('samaccountname', $username)){

            // User not found, throw validation exception
            throw ValidationException::withMessages([
                'username' => trans('auth.user_not_found'),
            ]);

        }else{

            $user = User::create([
                'name' => $record['name'][0],
                'email' => $record['mail'][0],
                'username' => $username,
                'password' => Hash::make($password),
            ]);
        }
    }
}
