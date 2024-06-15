<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'start_time' => ['required', 'unique:schedules,start_time', 'date_format:H:i'],
            'end_time' => ['required', 'unique:schedules,end_time', 'date_format:H:i'],
            'created_by' => 'required|string|max:50',
            'updated_by' => 'required|string|max:50'
        ];
    }
}
