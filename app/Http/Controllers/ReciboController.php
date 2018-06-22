<?php

namespace bomberos\Http\Controllers;

use Illuminate\Http\Request;

use bomberos\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use bomberos\Http\Requests\ReciboFormRequest;


use bomberos\Recibo;
use bomberos\Rubro;

use DB;
use Fpdf;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class ReciboController extends Controller
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
          $recibo=DB::table('recibo as r')
          ->join('rubro as ru', 'r.idrubro','=','ru.idrubro')
          ->select('r.fecha_emision','r.idrecibo','ru.tipo','r.cantidad','r.ingresadopor','r.estado')
          ->where('idrecibo','LIKE','%'.$query.'%')
            ->orwhere('ru.tipo','LIKE','%'.$query.'%')
          //->where ('estado','=','VIGENTE')
          ->orderBy('idrecibo','desc')
          ->groupBy('r.fecha_emision','r.idrecibo','ru.tipo','r.cantidad','r.ingresadopor','r.estado')
          ->paginate(7);
          return view('bomberos.recibo.index',["recibo"=>$recibo,"searchText"=>$query]);
      }
  }
  public function create()
  {

    $recibos = DB::table('rubro as ru')

          ->select('ru.idrubro','ru.tipo')
          ->where('ru.estado','=','ACTIVO')

          ->groupBy('ru.idrubro','ru.tipo')
          ->get();
          return view("bomberos.recibo.create",["recibos"=>$recibos]);

  }
  public function store (ReciboFormRequest $request)
  {
    try{
        DB::beginTransaction();
      $recibo=new Recibo;
      $recibo->idrecibo=$request->get('idrecibo');
      $recibo->idrubro=$request->get('idrubro');
      $recibo->fecha_emision=$request->get('fecha_emision');
      $mytime = Carbon::now('America/Guatemala');

      $recibo->fecha=$mytime->toDateTimeString();
      $recibo->recibidode=$request->get('recibidode');
      $recibo->nit=$request->get('nit');
      $recibo->direccion=$request->get('direccion');
      $recibo->cantidad=$request->get('cantidad');
      $recibo->estado='VIGENTE';
      $recibo->ingresadopor=$request->get('ingresadopor');
      $recibo->save();


    DB::commit();

  }catch(\Exception $e)
  {
      DB::rollback();
  }
      return Redirect::to('bomberos/recibo');

  }
  public function show($id)
  {
    $recibo=DB::table('recibo as r')
          ->join('rubro as ru','r.idrubro','=','ru.idrubro')
          ->select('r.fecha','r.fecha_emision','r.idrecibo','r.recibidode','r.nit','r.direccion','ru.tipo','r.cantidad','r.ingresadopor','r.estado')
          ->where('r.idrecibo','=',$id)
          ->first();
      return view("bomberos.recibo.show",["recibo"=>$recibo]);
  }
  public function edit($id)
  {
    $recibo=Recibo::findOrFail($id);
    $rubro = DB::table('rubro')->where('estado','=','ACTIVO')->get();
          
    return view("bomberos.recibo.edit",["recibo"=>$recibo, "rubro"=>$rubro]);
  }
  public function update(ReciboFormRequest $request,$id)
  {
      $recibo=Recibo::findOrFail($id);
      $recibo->idrecibo=$request->get('idrecibo');
      $recibo->idrubro=$request->get('idrubro');
      $recibo->fecha_emision=$request->get('fecha_emision');

      $mytime = Carbon::now('America/Guatemala');
      $recibo->fecha=$mytime->toDateTimeString();
      
      $recibo->recibidode=$request->get('recibidode');
      $recibo->nit=$request->get('nit');
      $recibo->direccion=$request->get('direccion');
      $recibo->cantidad=$request->get('cantidad');
      $recibo->estado='VIGENTE';
      $recibo->ingresadopor=$request->get('ingresadopor');
      $recibo->update();
      return Redirect::to('bomberos/recibo');
  }


  public function destroy(Request $request,$id)
  {
    $recibo=Recibo::findOrFail($id);
      $recibo->estado='ANULADO';
      $recibo->ingresadopor=$request->get('ingresadopor');
      $recibo->update();
      return Redirect::to('bomberos/recibo');
  }
}
