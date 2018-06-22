<?php

namespace bomberos\Http\Requests;

use bomberos\Http\Requests\Request;

class ReciboFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'idrecibo'=>'required',
          'idrubro'=>'required',
          'fecha_emision'=>'required',
          'recibidode'=>'required|max:100',
          'nit'=>'numeric',
          'direccion'=>'max:100',
          'cantidad'=>'required|numeric',
          'ingresadopor'=>'required'
        ];
    }
}
