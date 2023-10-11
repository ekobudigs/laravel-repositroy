<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::query()
            ->select('id', 'code', 'amount', 'note', 'created_at')
            ->latest()
            ->get()
            ->map(fn ($invoice) => [
                'id' => $invoice->id,
                'code' => $invoice->code,
                'note' => $invoice->note,
                'created_at' => $invoice->created_at->format('d M Y H:i'),
            ]);
    }
}
