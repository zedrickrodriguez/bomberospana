<?php

namespace bomberos;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
  protected $table='recibo';

  protected $primaryKey='idrecibo';

  public $timestamps=false;


  protected $fillable =[
    'idrecibo',
    'idrubro',
    'fecha_emision',
    'fecha',
    'recibode',
    'nit',
    'direccion',
    'cantidad',
    'estado',
    'ingresadopor'
  ];

  protected $guarded =[

  ];
}
