<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InvoiceRepository;
use App\Repositories\Intervace\InvoiceRepositoryIntervace;


class InvoiceController extends Controller
{

    // public function __construct(protected InvoiceRepository $invoiceRepository)
    // {
    // }
    public function index(User $user, InvoiceRepositoryIntervace $invoiceRepository)
    {
        return $invoiceRepository->byUser($user);
        // return Invoice::query()
        //     ->select('id', 'code', 'amount', 'note', 'created_at')
        //     ->latest()
        //     ->whereBelongsTo($user)
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
