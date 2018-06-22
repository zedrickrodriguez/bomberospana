<?php

namespace bomberos\Http\Controllers;

use bomberos\Http\Requests;
use Illuminate\Http\Request;
use bomberos\Recibo;
use bomberos\Rubro;

use DB;
use Fpdf;
use PDF;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request)
      {
          $query1=trim($request->get('searchText1'));
          $query2=trim($request->get('searchText2'));
          $recibo=DB::table('recibo as r')
          ->join('rubro as ru', 'r.idrubro','=','ru.idrubro')
          ->select('ru.tipo',DB::raw('sum(r.cantidad) as total'),DB::raw('count(r.idrecibo) as tot'))


          ->where('r.fecha_emision','>=',$query1)
          ->where('r.fecha_emision','<=',$query2)

          ->where ('r.estado','=','VIGENTE')
         // ->orderBy('ru.tipo','asc')
          ->groupBy('ru.tipo')
          ->paginate(7);
          return view('inicio',["recibo"=>$recibo,"searchText1"=>$query1,"searchText2"=>$query2]);
      }

        //return view('home');
    }
}
