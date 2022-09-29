<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;
    protected $fillable = [ 
        'FillOutDate',
        'FirstName',
        'MiddleName',	
        'LastName',	
        'Sex',	
        'Age',	
        'Citizenship',	
        'BirthDate',	
        'Religion',	
        'CivilStatus',	
        'TinNo',
        'id_ResNo',
        'IssueDate',
        'PlaceIssue',
        'FarmLotAddress',	
        'FarmLotSize',
        'NumberOfDependencies',
        'NumberofCreditReference',	
        'ProvincialAddress',	
        'HomePhoneNumber',
        'OfficePhoneNumber',
        'MobileNumber',
        'email',
        'SourceIncome',	
        'ProvidedBy',
        'EmployerName',	
        'WorkPosition',	
        'WorkAddress',	
        'WorkTelNumber',
        'DateEmployed',	
        'Salary',
        'UnitToBeUsedFor',
        'ModeOfPayment',
        'ApplicantSketch',	
        'ApplicantSignature',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function spouse(){
        return $this->hasOne(CustomerSpouse::class);
    }
    public function parent(){
        return $this->hasOne(CustomerParent::class);
    }
    public function address(){
        return $this->hasOne(CustomerAddress::class);
    }
    public function comaker(){
        return $this->hasOne(CustomerCoMaker::class);
    }
    public function creditreference(){
        return $this->hasMany(CustomerCreditReference::class);
    }
    public function dependent(){
        return $this->hasMany(CustomerDependent::class);
    }
    public function personalreference(){
        return $this->hasMany(CustomerPersonalReference::class);
    }

}
