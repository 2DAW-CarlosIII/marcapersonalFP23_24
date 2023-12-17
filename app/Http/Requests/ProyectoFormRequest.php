<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'docente_id' => 'nullable',
            'dominio' => 'nullable',
            'metadatos' => 'nullable',
            'archivoProyecto' => 'nullable|file|mimes:zip,rar,7z,gz,tar,tar.gz,tar.bz2',
        ];
    }

    public function messages()
    {
        return [
            'archivoProyecto.mimes' => 'El archivo del proyecto debe ser de tipo zip, rar, 7z o gz.',
        ];
    }
}


