<?php

namespace bomberos\Http\Controllers;

use Illuminate\Http\Request;

use bomberos\Http\Requests;

use bomberos\Recibo;
use bomberos\Rubro;

use DB;
use Fpdf;
use PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
       return view('reportes.reportes.index');
  }

  public function reportes(Request $request)
  {
    $date = date('Y-m-d');
    $query1=$request->input('searchText1');
    $query2=$request->input('searchText2');
     $recibo=DB::table('recibo as r')
     ->join('rubro as ru', 'r.idrubro','=','ru.idrubro')
     ->select('ru.tipo',DB::raw('sum(r.cantidad) as total'),DB::raw('count(r.idrecibo) as tot'))


     ->where('r.fecha_emision','>=',$query1)
     ->where('r.fecha_emision','<=',$query2)

     ->where ('r.estado','=','VIGENTE')
    
     ->groupBy('ru.tipo')
     ->get();
    $pdf = PDF::loadView('reportes.reportes.pdf', ["recibo"=>$recibo,
    "query1"=>$query1,"query2"=>$query2,"date"=>$date]);
    return $pdf->download('reporte.pdf');
    

  }
  public function create()
  {
    $recibos = DB::table('rubro as ru')

          ->select('ru.idrubro','ru.tipo')
          ->where('ru.estado','=','ACTIVO')

          ->groupBy('ru.idrubro','ru.tipo')
          ->get();
          return view("reportes.reportes.index",["recibos"=>$recibos]);
  }


  public function reportesxrubro(Request $request)
  {
    $date = date('Y-m-d');
    $query1=$request->input('fecha1');
    $query2=$request->input('fecha2');
    $idrubro=$request->input('idrubro');
     $recibo=DB::table('recibo as r')
     ->join('rubro as ru', 'r.idrubro','=','ru.idrubro')
     ->select('ru.tipo',DB::raw('sum(r.cantidad) as total'),DB::raw('count(r.idrecibo) as tot'))


     ->where('ru.idrubro','=',$idrubro)
     ->where('r.fecha_emision','>=',$query1)
     ->where('r.fecha_emision','<=',$query2)


     ->where ('r.estado','=','VIGENTE')
    
     ->groupBy('ru.tipo')
     ->get();
    $pdf = PDF::loadView('reportes.reportes.pdfxrubro', ["recibo"=>$recibo,
    "query1"=>$query1,"query2"=>$query2,"date"=>$date,"idrubro"=>$idrubro]);
    return $pdf->download('reporte.pdf');
    

  }



}
