<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Orangtua;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/orangtua/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],
        [
            'name.required'     => 'Nama harus diisi!',
            'name.max'          => 'Nama terlalu panjang!',
            'username.required' => 'Username harus diisi!',
            'username.unique'   => 'Username sudah terpakai!',
            'email.required'    => 'Email harus diisi!',
            'email.email'       => 'Format email tidak sesuai!',
            'email.max'         => 'Email terlalu panjang!',
            'email.unique'      => 'Email sudah terpakai!',
            'password.required' => 'Password harus diisi!',
            'password.min'      => 'Password minimal 6 karakter!',
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     // register orangtua

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'type' => 'Orang tua',
            'password' => bcrypt($data['password']),
        ]);
        $user->orangtua()->create([]);
        return $user;
    }
}
