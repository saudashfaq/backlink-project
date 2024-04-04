<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            
            'Links.1' => 'required|url',
            'Phrases.1' => 'required|string',
            'Links' => 'required|array',
            'Phrases' => 'required|array',
            'Links.*' => 'nullable|url',
            'Phrases.*' => 'nullable|string',
            'instructions' =>'nullable|string|min:3|max:500',
            
        ];
    }

    public function messages(): array {
        return [
            'Links.1' => "First Link is required and must be a valid URL.",
            'Phrases.1' => "First Phrase field is required.",
            'Links' => "Please provide at least one link.",
            'Phrases' => "Please provide at least one Keyword phrase.",
            'Links.*' => "The Link is required and must be a valid URL.",
            'Phrases.*' => "The Phrase field is required.",
            
        ];
        
    }
}
