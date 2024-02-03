<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            //'buyer_id' => 'required|exists:users,id',
            //'seller_id' => 'required|exists:users,id',
            'website_id' => 'required|exists:websites,id',
            'content_required' => 'required|boolean',
            'backlink_type' => 'required|in:backlink,guest_post', // Assuming BacklinkTypeEnum values
            //'order_amount' => 'required|numeric|min:0',
            'order_details' => 'required|array',
            'order_details.*.linkurl' => 'required|url',
            'order_details.*.keyphrase' => 'required|string',
            'order_status' => 'required|in:open,closed,completed', // Assuming OrderStatusEnum values
        ];
    }
}
