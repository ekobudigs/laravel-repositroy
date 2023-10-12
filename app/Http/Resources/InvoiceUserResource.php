<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'note' => $this->note,
            'amount' => number_format($this->amount, 0, '.', '.'),
            'created_at' => $this->created_at->format('d M Y H:i'),
        ];
    }
}
