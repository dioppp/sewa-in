<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'venue_id' => ['required', 'exists:venues,id'],
            'sport_id' => ['required', 'exists:sports,id'],
            'is_indoor' => ['required', 'boolean'],
            'material' => ['required', 'string', 'max:100'],
            'created_by' => ['required', 'string', 'max:20'],
            'updated_by' => ['required', 'string', 'max:20'],
            'photo' => 'required|image|file',
        ];
    }
}
