<?php

namespace bomberos\Http\Controllers;

use Illuminate\Http\Request;
use bomberos\Http\Requests;
use bomberos\Rubro;
use Illuminate\Support\Facades\Redirect;
use bomberos\Http\Requests\RubroFormRequest;
use DB;

class RubroController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
      if ($request)
      {
          $query=trim($request->get('searchText'));
          $rubro=DB::table('rubro')->where('tipo','LIKE','%'.$query.'%')
          ->where ('estado','=','ACTIVO')
          ->orderBy('idrubro','desc')
          ->paginate(7);
          return view('bomberos.rubro.index',["rubro"=>$rubro,"searchText"=>$query]);
      }
  }
  public function create()
  {
      return view("bomberos.rubro.create");
  }
  public function store (RubroFormRequest $request)
  {
      $rubro=new Rubro;
      $rubro->tipo=$request->get('tipo');
      $rubro->estado='ACTIVO';
      $rubro->save();
      return Redirect::to('bomberos/rubro');

  }
  public function show($id)
  {
      return view("bomberos.rubro.show",["rubro"=>Rubro::findOrFail($id)]);
  }
  public function edit($id)
  {
      return view("bomberos.rubro.edit",["rubro"=>Rubro::findOrFail($id)]);
  }
  public function update(RubroFormRequest $request,$id)
  {
      $rubro=Rubro::findOrFail($id);
      $rubro->tipo=$request->get('tipo');
      $rubro->update();
      return Redirect::to('bomberos/rubro');
  }
  public function destroy($id)
  {
      $rubro=Rubro::findOrFail($id);
      $rubro->estado='INACTIVO';
      $rubro->update();
      return Redirect::to('bomberos/rubro');
  }
}
