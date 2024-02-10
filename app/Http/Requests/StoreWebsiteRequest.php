<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWebsiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //TODO: make it only available for authorized visitors
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'user_id' => 'nullable',
            'url' => 'required|url',
            'details' => 'nullable|string',
            'is_visible'=> 'nullable|in:0,1',
            'website_status' => 'required|in:In Review,Rejected,Approved',
            'backlink_rates.*.words_count' => 'required|integer|min:100',
            'backlink_rates.*.price' => 'required|numeric|min:3',
            'backlink_rates.*.max_number_of_links' => 'required|integer|min:1',
            'categories' => 'required|array', // Ensure categories is an array
            'categories.*' => 'exists:categories,id', // Check if each category ID exists in the categories table
        ];
    }
}
