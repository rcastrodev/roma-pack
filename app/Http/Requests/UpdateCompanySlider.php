<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanySlider extends FormRequest
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
            'id'    => 'required',
            'order' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,svg|dimensions:min_width=500,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'id.required'       => 'ID del elemento es requerido',
            'order.required'    => 'Orden del elemento es requerido',
            'image.mimes'       => 'Solo se aceptan archivos con extension jpeg, jpg, png, svg',
            'image.dimensions'  => 'la imagen deben se de al menos 800x200'
        ];
    }
}
