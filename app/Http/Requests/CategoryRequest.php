<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $args = [
            'name' => 'required|string',
        ];

        if($this->id){
            $args['id'] = 'required';
        }else{
            $args['image_2'] = 'required';
        }

        return $args;
    }

    public function messages()
    {
        return [
            'name.required'  => 'El nombre es requerido',
            'image_2.required' => 'Imagen es requerida'   
        ];
    }
}
