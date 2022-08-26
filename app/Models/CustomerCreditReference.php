<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCreditReference extends Model
{
    use HasFactory;
    protected $fillable = [
        'StoreBank',
        'ItemLoadAmount',
        'Term',
        'CreditDate',
        'CreditBalance',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
