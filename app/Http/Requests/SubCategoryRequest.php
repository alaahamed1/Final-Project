<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('sub_category') ?? null;
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sub_categories')->ignore($id),
            ],
			'description' => 'string',
			'category_id' => 'required',
        ];
    }
}
