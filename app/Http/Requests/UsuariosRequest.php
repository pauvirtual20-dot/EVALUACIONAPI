<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

 class UsuariosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id'); // usuario/id

        return [
              'rol_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id'
            ],

            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'varchar',
                'max:255',
                Rule::unique('Usuarios', 'nombre')->ignore($UusarioId, 'id')
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'varchar',
                'max:255'
            ],
            'correo_verificado' => [
                $isUpdate ? 'sometimes' : 'required',
                'TimeStamp'
            ],
          'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            // 'codigo.required' => 'El código del centro es obligatorio.',
            // 'codigo.string' => 'El código debe ser texto.',
            // 'codigo.max' => 'El código no puede exceder los 20 caracteres.',
            // 'codigo.unique' => 'Este código de centro ya está registrado.',

            'rol_id.required' => 'El rol es obligatorio.',
            'rol_id.integer' => 'El rol debe ser un número entero.',
            'rol_id.exists' => 'El rol seleccionado no existe en el sistema.',

            'nombre.required' => 'El nombre del usuario es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede exceder los 150 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}

