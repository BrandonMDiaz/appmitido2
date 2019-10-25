<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Universidad;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UniversidadRegisterController extends Controller
{

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/homeU';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      // $this->middleware('guest');
      // $this->middleware('guest:universidad')->except('logout');
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
      return Universidad::create([
          'email' => $data['email'],
          'name' => $data['name'],
          'logo' => 'gds',
          'password' => Hash::make($data['password']),
      ]);
  }
  public function register(Request $request){
    //validamos
    $this->validator($request->all())->validate();
    //creamos
    $this->create($request->all());
    //logeamos
    if (Auth::guard('universidad')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      // if successful, then redirect to their intended location
      return redirect()->intended(route('homeU'));
    }
  }
  public function showRegisterForm()
  {
      return view('login.register');
  }
}
