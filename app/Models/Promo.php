<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'PromoImage',
        'PromoTitle',
        'PromoCaption',
        'PromoDescription',
        'PromoActive'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }


}