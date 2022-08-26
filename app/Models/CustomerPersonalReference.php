<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPersonalReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'PersonalReferenceName',	
        'PersonalReferenceRelationship',	
        'PersonalReferenceNumber',
        'PersonalReferenceAddress'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
