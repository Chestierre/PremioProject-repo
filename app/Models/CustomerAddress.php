<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'PresentAddress',	
        'LengthOfStay',	
        'HouseStatus',	
        'HouseProvidedBy',	
        'LotStatus',	
        'LotProvidedBy',
        'OtherPropertiesTV',
        'OtherPropertiesRef',
        'OtherPropertiesStereoComponent',
        'OtherPropertiesGasRange',
        'OtherPropertiesMotorcycle',
        'OtherPropertiesComputer',
        'OtherPropertiesFarmlot',
        'FarmLotAddress',
        'FarmLotSize',
        'ProvincialAddress',
        'customer_id'
    ];
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
