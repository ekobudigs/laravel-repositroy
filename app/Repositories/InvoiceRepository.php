<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Invoice;
use App\Http\Resources\InvoiceUserResource;
use App\Repositories\Intervace\InvoiceRepositoryIntervace;

class InvoiceRepository implements InvoiceRepositoryIntervace
{
    public function byUser(User $user)
    {
        $invoice = Invoice::query()
            ->select('id', 'code', 'amount', 'note', 'created_at')
            ->whereBelongsTo($user)
            ->latest()
            ->paginate(10);

        return InvoiceUserResource::collection($invoice);
    }
}
