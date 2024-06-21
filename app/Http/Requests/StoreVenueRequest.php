<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenueRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'unique:venues,name'],
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'required|image|file',
            'created_by' => 'required|string|max:50',
            'updated_by' => 'required|string|max:50'
        ];
    }
}
