<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'customer_id',
    ];
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
