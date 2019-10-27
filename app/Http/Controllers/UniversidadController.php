<?php

namespace App\Http\Controllers;

use App\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $universidades = Universidad::paginate(10);
      return view('universidad.index', compact('universidades'));
    }

}
