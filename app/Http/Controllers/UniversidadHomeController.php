<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversidadHomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:universidad');
  }
  
  public function universidad(){
    return view('home.universidad');
  }
  public function perfil(){
    return view('perfil.universidad');
  }
}
