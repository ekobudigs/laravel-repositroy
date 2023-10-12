<?php

namespace App\Repositories\Intervace;

use App\Models\User;


interface InvoiceRepositoryIntervace
{
    public function byUser(User $user);
}
