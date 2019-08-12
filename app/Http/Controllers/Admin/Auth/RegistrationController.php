<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
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
    protected $redirectTo = '/admin/home';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegiForm()
    {
    	return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function rules($data)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            //'image_url' => 'string|min:6|mimes:jpeg,gif,png',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'string|max:1000',
            'country' => 'string|max:1000',
            'state' => 'string|max:1000',
            'address' => 'string|max:1000',
            'role' => 'integer|max:10',
        ];
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {   
        $data = $request->all();
        $this->validate($request, $this->rules($data));
        $admin = Admin::create([
            'name' => $data['name'],   
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'country' => $data['country'],
            'state' => $data['state'],
            'address' => $data['address'],
            'role' => $data['role'],
        ]);
        $this->guard()->login($admin);
        return redirect($this->redirectTo);
    }


    public function guard()
    {
        return Auth::guard('admin');
    }
}

