<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'url' => 'required|url',
            'content_available' => 'required|boolean',
            'other_info' => 'nullable|string',
            'status' => 'required|integer',
            'categories' => 'array', // Assuming you are updating categories
            'backlink_type' => 'required|string', // Assuming you are updating backlink type
        ];
    }
}
