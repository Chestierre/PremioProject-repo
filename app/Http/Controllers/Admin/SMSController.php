<?php

namespace App\Http\Controllers\Admin;

use App\Models\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSController extends Controller
{

    public function index()
    {
        return view('admin.SMS.index');
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
    }


    public function show(SMS $sMS)
    {
        
    }

    public function edit(SMS $sMS)
    {
        
    }

     
    public function update(Request $request, SMS $sMS)
    {
        
    }

    public function destroy(SMS $sMS)
    {
        
    }
}
