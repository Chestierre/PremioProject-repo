<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDependent extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Age',
        'GradeOcc',
        'SchoolComp'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
