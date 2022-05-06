<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id',
        'shipping_price',
        'products_id',
        'price',        
        'transaction_status',        
    ];
}
