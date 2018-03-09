<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $partenaires = DB::table('partenaires')->get();
        return view('auth.register')
                ->with('partenaires', $partenaires);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if ($data['type'] == "Joueur") 
        {
            return Validator::make($data, [
                'id_public' => 'string',
                'pseudo' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'description' => 'string|max:255',
                'date_naissance' => 'required|date',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'type' => 'required|string',
            ]);
        }
        else
        {
            return Validator::make($data, [
                'id_public' => 'string',
                'pseudo' => 'max:255',
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'description' => 'max:255',
                'date_naissance' => 'required|date',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'type' => 'required|string',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['type'] == "Joueur") 
        {
            return User::create([
                'id_public' => $data['id_public'],
                'pseudo' => $data['pseudo'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'avatar' => $data['avatar'],
                'description' => $data['description'],
                'date_naissance' => $data['date_naissance'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'type' => $data['type']
            ]);
        }
        else
        {
            if (trim($data['avatar']) == null)  
            {
                $data['avatar'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUdFBZbl_qSONKU9QF_c_hIIpEJON0YLUnbLWQy78kLfa_rwZs_g";
            }
            return User::create([
                'id_public' => $data['id_public'],
                'pseudo' => $data['pseudo'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'avatar' => $data['avatar'],
                'description' => $data['description'],
                'date_naissance' => $data['date_naissance'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'type' => $data['type']
            ]);
        }
        
    }
}
