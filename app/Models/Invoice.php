<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function totalInvoice()
    {
        return $this->hasMany(InvoiceList::class, 'user_id', 'id');
    }
}
