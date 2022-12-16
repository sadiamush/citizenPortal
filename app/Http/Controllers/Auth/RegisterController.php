<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Citizen;
use App\Models\Network;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cnic' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'address'=>['required', 'string', 'max:955'],
            'role'=>['required'],
            'profile_picture'=>['required'],
            'city_name'=>['required'],
            "department_id"=>['required'],
            "education_id"=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
            "cnic" => $data['cnic'],
            "profession" => $data['profession'],
            "age" => $data['age'],
            "address" => $data['address'],
            "profile_picture" => Storage::disk('public')->put('user',$data['profile_picture']),
        ]);




        Citizen::create([
           "user_id"=>$user['id'],
           "network_id"=>$data['city_name'],
           "department_id"=>$data['department_id'],
           "education_id"=>$data['education_id'],
        ]);

        return $user;
    }
}
