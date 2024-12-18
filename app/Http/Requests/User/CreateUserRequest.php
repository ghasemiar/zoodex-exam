<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        return [
            'name' => ['required ','string','max:255','min:8'],
            'email' => ['required','string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['nullable','exists:roles,id'],
        ];
    }
}
