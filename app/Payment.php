<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'paid_at', 'amount', 'card_last_four_digits',
        'invoice_id', 'transaction_id'
    ];

    protected $casts = [
        'paid_at' => 'datetime'
    ];

    public function request()
    {
        return $this->hasOne(Order::class);
    }
}
