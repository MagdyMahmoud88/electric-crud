<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'أسم المنتج مطلوب',
            'name.string' => 'أسم المنتج يجب أن يكون نصاً',
            'name.max' => 'أسم المنتج لا يمكن أن يتجاوز 255 حرف.',
            'description.string' => 'وصف المنتج يجب أن يكون نصاً',
            'price.required' => 'سعر المنتج مطلوب',
            'price.numeric' => 'سعر المنتج يجب أن يكون عدداً',
            'price.min' => 'سعر المنتج يجب أن يكون أكبر من 0',
        ];
    }
}
