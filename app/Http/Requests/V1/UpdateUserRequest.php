<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $method = $this->getMethod();

        if ($method === 'PUT')
            return [
                'fullName' => 'string|max:255',
                'email' => 'email|unique:users',
                'password' => 'string|min:8',
            ];
        else
            return [
                'fullName' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:users',
                'password' => 'sometimes|required|string|min:8',
            ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('fullName')) {
            $this->merge([
                'full_name' => $this->input('fullName'),
            ]);
        }
    }
}
