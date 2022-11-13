<?php
 
namespace App\Console\Commands;

use App\Models\Order;
use App\Models\SmsTemplate;
use App\Models\SMS;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SendSmsOrderReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smsmessage:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to test the send function for scheduling sms api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $dt = Carbon::now();
        //$dt->day = 14;
        $dt->hour = 9;
        $dt->minute = 0;
        $dt->second = 0;
        $order = Order::with(['orderhistory','ordertransactiondetails', 'ordercustomerinformation', 'customer'])
                    ->where('due_date', '=', $dt)
                    ->get();;        
        
         //dd(count($order));
        $smstemplate = SmsTemplate::find(1);  
        //dd($smstemplate);

        
        foreach ($order as $order){
            $message = $smstemplate->beforename . $order->ordercustomerinformation->FirstName . ' ' . $order->ordercustomerinformation->LastName .  $smstemplate->inbetweennamebalance . number_format($order->balancetobepaid) . $smstemplate->inbetweenbalanceunitname . $order->ordertransactiondetails->unitmodelname . $smstemplate->afterunitname ;
            $phone = ($order->customer) ? $order->customer->MobileNumber : $order->ordercustomerinformation->MobileNumber;
            //dd($message);


            $response = Http::asform()->post('https://smsgateway.servicesforfree.com/api/send?key=35a6b5c9d8220cd2a1febe5376bb70c65df94bfe', [
                 'phone' =>$phone,
                 'message' => $message,
             ]);
            //  dd($response->json());
            $responsejson = $response->json();
            if ($responsejson['status']){
                SMS::create([
                    'type' => "Order Reminder",
                    'recipient' => $order->ordercustomerinformation->FirstName . ' ' . $order->ordercustomerinformation->LastName,
                    'recipientnumber' => ($order->customer) ? $order->customer->MobileNumber : $order->ordercustomerinformation->MobileNumber,
                    'message' => $message,
                    'status' => $responsejson['status'],
                    'apimessage' => $responsejson['status']
                ]);
            }


        }
        
        return Command::SUCCESS;
    }
}
