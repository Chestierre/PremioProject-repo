<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSpouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Age',
        'ProvincialAddress',
        'MobileNumber',
        'Email',
        'Employer',
        'Position',
        'JobAddress',
        'WorkTelNum',
        'DateEmployed',
        'Salary',
        'SpouseSignature'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
