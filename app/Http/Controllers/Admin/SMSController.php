<?php

namespace App\Http\Controllers\Admin;

use App\Models\SMS;
use App\Models\SmsTemplate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSController extends Controller
{

    public function index()
    {
        $sms = SMS::all();
        return view('admin.SMS.index', compact('sms'));
    }


    public function create()
    {
        $smstemplate = SmsTemplate::find(1);
        return view('admin.SMS.smstemplate', compact('smstemplate'));
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
    
    public function sendapisms(Request $request){
        //dd($request->all());
        $response = Http::asform()->post('https://smsgateway.servicesforfree.com/api/send?key=35a6b5c9d8220cd2a1febe5376bb70c65df94bfe', [
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        // $response = Http::asform()->post('https://smsgateway.servicesforfree.com/api/send?key=35a6b5c9d8220cd2a1febe5376bb70c65df94bfe', [
        //     'phone' => "+639056138839",
        //     'message' => "Network Administrator liasdasd asdasdasd asdasdasd sadasdasd",
        // ]);
        // $response = Http::get('https://smsgateway.servicesforfree.com/api/send?key=35a6b5c9d8220cd2a1febe5376bb70c65df94bfe');
        //return $response;
        //dd($response->json());
        //dd(json_decode($response->json()));
        return back()->with($response->json());
    }
    
    public function setsmstemplate(Request $request){
        $request->validate([
            'beforename' => 'string|nullable',
            'inbetweennamebalance' => 'string|nullable',
            'inbetweenbalanceunitname' => 'string|nullable',
            'afterunitname' => 'string|nullable'
        ]);

        $smstemplate = SmsTemplate::find(1);

        $smstemplate -> update([
            'beforename' => $request->beforename,
            'inbetweennamebalance' => $request->inbetweennamebalance,
            'inbetweenbalanceunitname' => $request->inbetweenbalanceunitname,
            'afterunitname' => $request->afterunitname
        ]);
        

        return redirect()->route('admin.SMS.index');

    }

}
// array:3 [▼ // app\Http\Controllers\Admin\SMSController.php:64
//   "status" => 400
//   "message" => "Invalid Request!"
//   "data" => false
// ]
