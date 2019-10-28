<?php

namespace App\Http\Controllers;

use App\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function index(Request $request)
    {
      if(isset($request->buscar) && $request->buscar != null){
        $universidades = Universidad::where('name', 'like', '%'.$request->buscar.'%')
        ->paginate(10);
      }
      else{
        $universidades = Universidad::paginate(10);
      }
      return view('universidad.index', compact('universidades'));
    }


}
