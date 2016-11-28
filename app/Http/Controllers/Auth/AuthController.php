<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/dashboard'; // it is ignored (see redirectPath method)

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $this->sendWelcomeToClient($user);

        return $user;
    }

    private function sendWelComeToClient(User $user) {
        // Destination
        $target_email = $user->email;
        // Data
        $data['name'] = $user->name;
        // Send mail
        Mail::send('emails.welcome_client', $data, function ($message) use ($target_email) {
            $message->from('admin@quickdeal.pe', 'Quick Deal');

            $message->to($target_email)->subject('Bienvenido a Quick Deal!');
        });
    }

    public function redirectPath()
    {
        $user = auth()->user(); // authenticated user

        if ($user->provider) {
            if ($user->default_password)
                return '/change-password';

            return '/apply';
        }

        return '/request';
    }
}
