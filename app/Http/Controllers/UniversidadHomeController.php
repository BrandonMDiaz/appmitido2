<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UniversidadHomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:universidad');
  }

  public function universidad(){
    $user = Auth::user();
    if($user->logo != null )
    {
      return view('home.universidad', compact('user'));
    }
    return view('perfil.agregarLogo', compact('user'));
  }

  public function show(){
    $user = Auth::user();
    return view('perfil.editarU', compact('user'));
  }

  public function edit(Request $request)
  {
    $request->validate([
      'name' => 'required|min:3|max:155',
      'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    $user = Auth::user();
    $user->name = $request->name;
    $user->logo = $request->file('logo')->store('/public/universidad');
    $user->save();
    return view('home.universidad', compact('user'));
  }

  public function editar(Request $request)
  {
    $request->validate([
      'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $user = Auth::user();
    $user->logo = $request->file('logo')->store('/public/universidad');
    $user->save();

    return view('home.universidad', compact('user'));
  }

  public function perfil(){
    return view('perfil.universidad');
  }
}
