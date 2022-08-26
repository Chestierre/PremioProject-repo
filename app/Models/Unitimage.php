<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitimage extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'image',
        'ImageVariation'
    ];


    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
