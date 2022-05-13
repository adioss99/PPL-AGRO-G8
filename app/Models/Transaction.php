<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'shipping_price',
        'total_price',
        'resi',        
        'transaction_status',        
        'code',        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }
    public function detail(){
        return $this->hasMany( TransactionDetail::class, 'id', 'transactions_id' );
    }
}
