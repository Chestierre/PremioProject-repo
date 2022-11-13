<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'recipient',
        'recipientnumber',
        'message',
        'status',
        'apimessage'
    ];
}
