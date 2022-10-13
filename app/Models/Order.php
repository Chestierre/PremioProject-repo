<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'customer_id',
        'balance',
        'currentmonth',
        'monthspaid',
        'orderstatus',
        'customerstatus',

        'monthone',
        'monthtwo',
        'monththree',
        'monthfour',
        'monthfive',
        'monthsix',
        'monthseven',
        'montheight',
        'monthnine',
        'monthten',
        'montheleven',
        'monthtwelve',
        'monththirteen',
        'monthfourteen',
        'monthfifteen',
        'monthsixteen',
        'monthseventeen',
        'montheigthteen',
        'monthnineteen',
        'monthtwenty',
        'monthtwentyone',
        'monthtwentytwo',
        'monthtwentythree',
        'monthtwentyfour',
        'monthtwentyfive',
        'monthtwentysix',
        'monthtwentyseven',
        'monthtwentyeight',
        'monthtwentynine',
        'monththirthy',
        'monththirthyone',
        'monththirthytwo',
        'monththirthythree',
        'monththirthyfour',
        'monththirthyfive',
        'monththirthysix'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function orderhistory(){
        return $this->hasMany(OrderHistory::class);
    }
    public function ordertransactiondetails(){
        return $this->hasOne(OrderTransactionDetails::class);
    }
    public function ordercustomerinformation(){
        return $this->hasOne(OrderCustomerInformation::class);
    }
}
