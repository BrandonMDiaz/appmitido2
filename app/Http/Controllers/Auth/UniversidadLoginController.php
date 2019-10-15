<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UniversidadLoginController extends Controller
{
  /*

  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  protected $guard = 'universidad';

  /**
  * Where to redirect users after login.
  */

  protected $redirectTo = '/homeU';

  /**
  * Create a new controller instance.
  */

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    $this->middleware('guest:universidad')->except('logout');
  }

  public function showLoginForm()
  {
    return view('login.index');
  }

  public function logout(Request $request){
    auth('universidad')->logout();
    return redirect()->route('universidad-login');
  }

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
            'emailU' => 'email'
        ]);
    // Validate the form data
    $this->validate($request, [
    'emailU' => 'required|email',
    'passwordU' => 'required|min:6'
    ]);
    $validator->getMessageBag()->add('emailU', 'Email wasn´t recogniced');
    // Attempt to log the user in
    if (Auth::guard('universidad')->attempt(['email' => $request->emailU, 'password' => $request->passwordU], $request->remember)) {
      // if successful, then redirect to their intended location
      return redirect()->intended(route('homeU'));
    }
    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withErrors($validator)->withInput($request->only('emailU', 'remember'));
  }
}
