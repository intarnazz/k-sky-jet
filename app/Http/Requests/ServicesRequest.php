<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicesRequest extends FormRequest
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
        $id = $this->route('service');
        return [
            'name' => [
                'required',
                Rule::unique('services')->ignore($id),
            ],
            "description" => "required",
            "price" => "required|integer",
            'type' => 'required|in:VIP,transfers,rentals',
            "image" => "file",
        ];
    }
}
