<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanySlider extends FormRequest
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
            'section_id'    => 'required',
            'order'         => 'required',
            'image'         => 'nullable|mimes:jpeg,jpg,png,svg|dimensions:min_width=800,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'section_id.required'   => 'ID del elemento es requerido',
            'order.required'        => 'Orden del elemento es requerido',
            'image.required'        => 'Imagen es requerida',
            'image.mimes'           => 'Solo se aceptan archivos con extension jpeg, jpg, png, svg',
            'image.dimensions'      => 'la imagen deben se de al menos 800x200'
        ];
    }
}
