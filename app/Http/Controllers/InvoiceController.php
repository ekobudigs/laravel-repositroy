<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

use App\Repositories\InvoiceRepository;
use App\Repositories\Intervace\InvoiceRepositoryIntervace;

class InvoiceController extends Controller
{

    public function __construct(protected InvoiceRepositoryIntervace $invoiceRepository)
    {
    }
    public function index(Request $request)

    {

        return $this->invoiceRepository->byUser($request->user());


        // return Invoice::query()
        //     ->select('id', 'code', 'amount', 'note', 'created_at')
        //     ->whereBelongsTo($request->user())
        //     ->latest()
        //     ->get()
        //     ->map(fn ($invoice) => [
        //         'id' => $invoice->id,
        //         'code' => $invoice->code,
        //         'note' => $invoice->note,
        //         'amount' => number_format($invoice->amount, 0, '.', '.'),
        //         'created_at' => $invoice->created_at->format('d M Y H:i'),
        //     ]);
    }
}
