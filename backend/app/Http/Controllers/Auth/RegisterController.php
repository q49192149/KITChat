<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id' => ['required', 'integer'],
            'academic_year' => ['required', 'string', 'size:2'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'integer'],
            'faculty' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'club' => ['required', 'integer'],
            //'type' => ['required', 'string', 'max:255'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'id' => $data['id'],
            'academic_year' => $data['academic_year'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'faculty' => $data['faculty'],
            'department' => $data['department'],
            'club' => $data['club'],
            //'type' => $data['type'],
        ]);
    }
}
