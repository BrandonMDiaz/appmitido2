<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest');
    $this->middleware('guest:universidad');
  }

  public function index()
  {
    return view('landing.index');
  }



}
