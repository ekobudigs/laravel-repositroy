<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Invoice;

class InvoiceRepository
{
    public function byUser(User $user)
    {
        return Invoice::query()
            ->select('id', 'code', 'amount', 'note', 'created_at')
            ->whereBelongsTo($user)
            ->latest()
            ->get()
            ->map(fn ($invoice) => [
                'id' => $invoice->id,
                'code' => $invoice->code,
                'note' => $invoice->note,
                'amount' => number_format($invoice->amount, 0, '.', '.'),
                'created_at' => $invoice->created_at->format('d M Y H:i'),
            ]);
    }
}
