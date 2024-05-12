<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
    public function rules(): array
    {
        $emailUnico = 'unique:App\Models\User,email';

        if($this->isMethod('PUT') || $this->isMethod('PATCH')){
            $emailUnico = $emailUnico . ',' . $this->route('usuario')->id;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $emailUnico],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
