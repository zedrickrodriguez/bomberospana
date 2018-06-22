<?php

namespace bomberos;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
  protected $table='rubro';

  protected $primaryKey='idrubro';

  public $timestamps=false;


  protected $fillable =[
    'tipo',
    'estado'
  ];

  protected $guarded =[

  ];
}
