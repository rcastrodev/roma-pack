<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyInfoRequest extends FormRequest
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
            'content_1' => 'required',
            'content_2' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required'           => 'ID del elemento es requerido',
            'content_1.required'    => 'Contenido es requerido',
            'content_2.required'    => 'Video es requerido',
        ];
    }
}
