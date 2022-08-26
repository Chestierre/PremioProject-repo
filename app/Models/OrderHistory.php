<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'balance',
        'currentmonth',
        'payment',
        'date_updated',
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
        'monththirthysix',



    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
