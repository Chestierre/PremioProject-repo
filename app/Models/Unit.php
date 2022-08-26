<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'modelname',
        'modeldescription',
        'price',
        'modelcaption',
        'modeldownpayment',
        'modelDiscount'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function unitimage(){
        return $this->hasMany(Unitimage::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
