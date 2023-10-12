<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)

    {
        return Invoice::query()
            ->select('id', 'code', 'amount', 'note', 'created_at')
            ->whereBelongsTo($request->user())
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
