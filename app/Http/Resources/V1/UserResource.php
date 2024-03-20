<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fullName' => $this->full_name,
            'email' => $this->email,
            'invoices' => new InvoiceCollection($this->whenLoaded('invoices')),
        ];
    }
}
