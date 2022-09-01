<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brandname',
        'sixMonthRate',
        'twelveMonthRate',
        'eigthteenMonthRate',
        'twentyfourMonthRate',
        'thirtyMonthRate',
        'thirtysixMonthRate'
    ];

    public function unit(){
        return $this->hasMany(Unit::class);
    }
    
}
