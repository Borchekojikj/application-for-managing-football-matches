<?php

namespace App\Http\Requests;

use App\Rules\CheckAge;
use Illuminate\Foundation\Http\FormRequest;

class CreatePlayerRequest extends FormRequest
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
            'name' => 'required',
            'date_of_birth' => ['required', new CheckAge(18)],
            'team_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'date_of_birth.required' => 'The date of birth field is required.',
            'team_id.required' => 'The team field is required.',
        ];
    }
}
