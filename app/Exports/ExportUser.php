<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::with('customer.order','customer.spouse','customer.comaker','customer.address','customer.parent', 'customer.dependent', 'customer.personalreference','customer.creditreference')->get();
        return User::all();
    }
}
