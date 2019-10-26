<?php

namespace App\Http\Controllers;

use App\Tutorial;
use App\SubCategoria;

use Illuminate\Http\Request;
use App\Http\Controllers\StatusExamen;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:universidad');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $universidad_id = Auth::guard('universidad')->id();
      $tutoriales = Tutorial::where('universidad_id', '=', $universidad_id)
      ->with('subcategoria')
        ->paginate(15);
      return view('tutoriales.indexU', compact('tutoriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $universidad_id = Auth::guard('universidad')->id();
      $subcategorias = SubCategoria::where('universidad_id', '=', $universidad_id)
      ->get();
      return view('tutoriales.create', compact('subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
      'titulo' => 'required|max:255',
      'description' => 'required',
      ]);
      $tut = new Tutorial();
      $tut->titulo = $request->input('titulo');
      $tut->universidad_id = Auth::guard('universidad')->id();
      $tut->subcategoria_id = $request->subcategoria_id;
      $tut->texto = $request->description;
      // $tut->subcategoria_id = $request->input('categoria_id');
      $tut->save();
      return redirect()->route('tutoriales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutoriale)
    {
      return view('tutoriales.show', compact('tutoriale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutoriale)
    {
      $tutoriale->delete();
      return redirect()->route('tutoriales.index');
    }
}
