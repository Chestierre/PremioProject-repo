<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCoMaker extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',	
        'Age',
        'Sex',
        'Address',	
        'CoMakeTelNumber',
        'Residence',
        'ResidenceProvidedBy',
        'CivilStatus',
        'Relationship',
        'BirthDate',
        'Tin',
        'MobileNo',
        'Employer',	
        'CoMakeDateEmployed',
        'Position',	
        'TelNo',
        'EmployerAddress',	
        'EmploymentStatus',
        'CreditReference1',
        'CreditReference2',
        'CreditReference3',
        'Sketch',
        'Signature',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
