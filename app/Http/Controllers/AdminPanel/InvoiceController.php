<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index(User $user)
    {
        return Invoice::query()
            ->select('id', 'code', 'amount', 'note', 'created_at')
            ->latest()
            ->whereBelongsTo($user)
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
