<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WayRequest extends FormRequest
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
            "route" => "required",
            "description" => "required",
            "departure_time" => "required",
            "arrival_time" => "required",
            "price" => "required",
            "class" => "required",
            "image" => "file",
        ];
    }
}
