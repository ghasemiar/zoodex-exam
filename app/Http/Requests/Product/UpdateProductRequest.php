<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:255',
            'description'=>'nullable|string',
            'quantity'=>'required|integer|min:1',
            'price'=>'required|integer|min:1',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
