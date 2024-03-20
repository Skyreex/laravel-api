<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreInvoiceRequest extends FormRequest
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
            '*.userId'=> 'required|exists:users,id',
            '*.amount' => 'required|numeric|min:0.01',
        ];
    }

    protected function prepareForValidation()
    {
       $data = [];

       foreach ($this->toArray() as $obj) {
            $obj['user_id'] = $obj['userId'] ?? null;

            $data[] = $obj;
       }
       $this->merge($data);
    }
}
