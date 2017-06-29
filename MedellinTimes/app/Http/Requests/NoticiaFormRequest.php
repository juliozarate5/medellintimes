<?php

namespace MedellinTimes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaFormRequest extends FormRequest
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
        'idcategoria_noticia'=>'required',
        'titulo'=>'required|max:45',
        'foto'=>'mimes:jpeg,bmp,jpg,png',
        'contenido'=>'required|max:250',
        'users_id'=>'required'
        ];
    }
}
