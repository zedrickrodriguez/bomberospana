<?php

namespace bomberos\Http\Requests;

use bomberos\Http\Requests\Request;

class RubroFormRequest extends Request
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
          'tipo'=>'required|max:100'

        ];
    }
}
