<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
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
        return [
            // 'email' => ['required', 'string', 'email'],
            'cpfNo' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $cpfNo      =   $this->input('cpfNo');
        $password   =   $this->input('password');

        $user       =   User::where('cpfNo', $cpfNo)->first();
        
        if($user == null){

            $connection = Container::getConnection('default');
            $record = $connection->query()->findBy('samaccountname', $cpfNo );

            if(!$record) {

                throw ValidationException::withMessages([
                    'cpfno' => trans('auth.failed'),
                ]);

            }else{

                $user = User::create([
                    'name' => $record['name'][0],
                    'email' => $record['mail'][0],
                    'cpfNo' => $cpfNo,
                    // 'username' => $request->username,
                    'password' => Hash::make($password),
                ]);
            }
        }

        // Attempt LDAP authentication
        if (! Auth::attempt(['cpfno' => $cpfNo, 'password' => $password])) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'cpfno' => trans('auth.failed'),
            ]);
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
            'email' => trans('auth.throttle', [
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
}
