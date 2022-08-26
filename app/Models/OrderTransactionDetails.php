<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransactionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'unitmodelname',
        'brandname',
        'brandrate',
        'unitmodelprice',
        'initial_price', //plus discounts
        'unitmodeldownpayment',
        'monthlypayment',
        'monthsinstallment'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
