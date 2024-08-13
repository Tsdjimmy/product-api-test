<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'category_id' => 'sometimes|required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'nullable|url',
            'variants' => 'nullable|array',
            'variants.*.variant_name' => 'required_with:variants|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
            'stock.required' => 'The product stock is required.',
            'stock.integer' => 'The product stock must be an integer.',
            'stock.min' => 'The product stock must be at least 0.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'images.array' => 'The images must be an array.',
            'images.*.url' => 'Each image must be a valid URL.',
            'variants.array' => 'The variants must be an array.',
            'variants.*.name.required_with' => 'Each variant name is required when variants are provided.',
            'variants.*.name.string' => 'Each variant name must be a string.',
            'variants.*.value.required_with' => 'Each variant value is required when variants are provided.',
            'variants.*.value.string' => 'Each variant value must be a string.',
        ];
    }
}

