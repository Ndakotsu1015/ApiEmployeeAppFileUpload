<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|file|max:2048',
            'state_id' => 'required|exists:states,id',
            'local_government_id' => 'required|exists:local_governments,id',
            'addres' => 'required|string|maz:255',
            'marital_status_id' => 'required|exists:marital_statuses,id',
        ];
    }
}