<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class HomeSliderUpdateRequest extends FormRequest
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
        return [
            'order'         => 'nullable|min:2|max:2',
            'content_2'     => 'required',
            'image'         => 'mimes:jpeg,bmp,png|nullable',
        ];
    }

    public function messages()
    {
        return [
            'order.min'         => 'Orden solo puede tener dos caracteres',
            'order.max'         => 'Orden solo puede tener dos caracteres',
            'content_2.required'=> 'El título es obligatorio',
            'image.mimes'       => 'Solo se aceptan imágenes en formato jpeg,bmp y png',
        ];
    }
}
