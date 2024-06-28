<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVenueRequest extends FormRequest
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
            'id' => 'required|integer|exists:venues,id',
            'name' => ['required', 'string', 'max:50', 'unique:venues,name,' . $this->id],
            'address' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:255',
            'updated_by' => 'required|string|max:50'
        ];
    }
}
