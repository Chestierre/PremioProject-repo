<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Preorder;
use App\Models\Unit;
use App\Models\Customer;
use App\Models\User;
use App\Models\OrderTransactionDetails;
use App\Models\OrderHistory;
use App\Models\OrderCustomerInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        // $order = Order::all();
        $order = Order::orderBy('due_date', 'asc')->get();

        // $customer = Customer::with(['user' => function($query){$query->where('userrole', 'Customer');}])->get();
        // $customer = Customer::all();

        $customer = Customer::whereHas('user', function(Builder $query){
            $query->where('userrole', 'Customer');
        })->get();
        // dd($customer);
        
        $user = User::all();

        
        // $user = User::with('customer')->where('userrole', 'Customer')->get();
        // dd($user->customer);
        return view('admin.order.index', compact('unit','order','customer', 'user'));
    }
    public function create()
    {
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
         $dt = Carbon::now();
         $dt->hour = 9;
         $dt->minute = 0;
         $dt->second = 0;

        // $dt = Carbon::create(2023, 1, 29);

        if($dt->day > 7 && $dt->day <= 14)
        {
            $daysy = 14 - $dt->day;
            $dt->addDays($daysy);
            $paymentdate = "14";
            
        }
        else if($dt->day > 14 && $dt->day <= 21)
        {
            $daysy = 21 - $dt->day;
            $dt->addDays($daysy);
            $paymentdate = "21";
            
        }
        else if($dt->day > 21 && $dt->day <= 28)
        {
            $daysy = 28 - $dt->day;
            $dt->addDays($daysy);
            $paymentdate = "28";
            
        }
        else if($dt->day <= 7)
        {
            $dt->day = 7;
            $paymentdate = "7";
            
        }
        else
        {
            $dt->addWeek();
            $dt->day = 7;
            $paymentdate = "7";
            
        }

        $unit_downpayment = Unit::find($request->unit_id);

        // dd($unit_downpayment->modeldownpayment);
         $request->validate([
             'customer_id' => 'required',
             'unit_id' => 'required',
             'downpayment' => "required|integer|min:$unit_downpayment->modeldownpayment|max:$unit_downpayment->price",
             'monthsinstallment' => 'required|integer',
             'monthly' => 'required|integer',
             'balance' => 'required|integer',
             'flag' => 'nullable|in:1,2'
          ]);

          if($request->flag == 1 || $request->flag == 2){
            $preorder = Preorder::with('customer')->find($request->preorder_id);
            if ($request->applicantcheck == 1){
                $user = User::find($preorder->customer->user_id);
                $user->update([
                    'userrole' => "Customer",
                ]);
            }
            $preorder->delete();
          }

          $unit = Unit::with('brand')->find($request->unit_id);

          switch($request->monthsinstallment){
                case 12:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                        'monthseven' => $request->monthly,
                        'montheight' => $request->monthly,
                        'monthnine' => $request->monthly,
                        'monthten' => $request->monthly,
                        'montheleven' => $request->monthly,
                        'monthtwelve' => $request->monthly,
                     ]);
                     OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->twelveMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                        'monthseven' => $order->monthseven,
                        'montheight' => $order->montheight,
                        'monthnine' => $order->monthnine,
                        'monthten' => $order->monthten,
                        'montheleven' => $order->montheleven,
                        'monthtwelve' => $order->monthtwelve,
                    ]);
                    break;
                case 18:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                        'monthseven' => $request->monthly,
                        'montheight' => $request->monthly,
                        'monthnine' => $request->monthly,
                        'monthten' => $request->monthly,
                        'montheleven' => $request->monthly,
                        'monthtwelve' => $request->monthly,
                        'monththirteen' => $request->monthly,
                        'monthfourteen' => $request->monthly,
                        'monthfifteen' => $request->monthly,
                        'monthsixteen' => $request->monthly,
                        'monthseventeen' => $request->monthly,
                        'montheigthteen' => $request->monthly,
                     ]);
                     OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->eigthteenMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                        'monthseven' => $order->monthseven,
                        'montheight' => $order->montheight,
                        'monthnine' => $order->monthnine,
                        'monthten' => $order->monthten,
                        'montheleven' => $order->montheleven,
                        'monthtwelve' => $order->monthtwelve,
                        'monththirteen' => $order->monththirteen,
                        'monthfourteen' => $order->monthfourteen,
                        'monthfifteen' => $order->monthfifteen,
                        'monthsixteen' => $order->monthsixteen,
                        'monthseventeen' => $order->monthseventeen,
                        'montheigthteen' => $order->montheigthteen,
                    ]);
                    break;
                case 24:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                        'monthseven' => $request->monthly,
                        'montheight' => $request->monthly,
                        'monthnine' => $request->monthly,
                        'monthten' => $request->monthly,
                        'montheleven' => $request->monthly,
                        'monthtwelve' => $request->monthly,
                        'monththirteen' => $request->monthly,
                        'monthfourteen' => $request->monthly,
                        'monthfifteen' => $request->monthly,
                        'monthsixteen' => $request->monthly,
                        'monthseventeen' => $request->monthly,
                        'montheigthteen' => $request->monthly,
                        'monthnineteen' => $request->monthly,
                        'monthtwenty' => $request->monthly,
                        'monthtwentyone' => $request->monthly,
                        'monthtwentytwo' => $request->monthly,
                        'monthtwentythree' => $request->monthly,
                        'monthtwentyfour' => $request->monthly,
                     ]);
                     OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->twentyfourMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                        'monthseven' => $order->monthseven,
                        'montheight' => $order->montheight,
                        'monthnine' => $order->monthnine,
                        'monthten' => $order->monthten,
                        'montheleven' => $order->montheleven,
                        'monthtwelve' => $order->monthtwelve,
                        'monththirteen' => $order->monththirteen,
                        'monthfourteen' => $order->monthfourteen,
                        'monthfifteen' => $order->monthfifteen,
                        'monthsixteen' => $order->monthsixteen,
                        'monthseventeen' => $order->monthseventeen,
                        'montheigthteen' => $order->montheigthteen,
                        'monthnineteen' => $order->monthnineteen,
                        'monthtwenty' => $order->monthtwenty,
                        'monthtwentyone' => $order->monthtwentyone,
                        'monthtwentytwo' => $order->monthtwentytwo,
                        'monthtwentythree' => $order->monthtwentythree,
                        'monthtwentyfour' => $order->monthtwentyfour,
                    ]);
                    break;
                case 30:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                        'monthseven' => $request->monthly,
                        'montheight' => $request->monthly,
                        'monthnine' => $request->monthly,
                        'monthten' => $request->monthly,
                        'montheleven' => $request->monthly,
                        'monthtwelve' => $request->monthly,
                        'monththirteen' => $request->monthly,
                        'monthfourteen' => $request->monthly,
                        'monthfifteen' => $request->monthly,
                        'monthsixteen' => $request->monthly,
                        'monthseventeen' => $request->monthly,
                        'montheigthteen' => $request->monthly,
                        'monthnineteen' => $request->monthly,
                        'monthtwenty' => $request->monthly,
                        'monthtwentyone' => $request->monthly,
                        'monthtwentytwo' => $request->monthly,
                        'monthtwentythree' => $request->monthly,
                        'monthtwentyfour' => $request->monthly,
                        'monthtwentyfive' => $request->monthly,
                        'monthtwentysix' => $request->monthly,
                        'monthtwentyseven' => $request->monthly,
                        'monthtwentyeight' => $request->monthly,
                        'monthtwentynine' => $request->monthly,
                        'monththirthy' => $request->monthly,
                     ]);
                     OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->thirtyMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                        'monthseven' => $order->monthseven,
                        'montheight' => $order->montheight,
                        'monthnine' => $order->monthnine,
                        'monthten' => $order->monthten,
                        'montheleven' => $order->montheleven,
                        'monthtwelve' => $order->monthtwelve,
                        'monththirteen' => $order->monththirteen,
                        'monthfourteen' => $order->monthfourteen,
                        'monthfifteen' => $order->monthfifteen,
                        'monthsixteen' => $order->monthsixteen,
                        'monthseventeen' => $order->monthseventeen,
                        'montheigthteen' => $order->montheigthteen,
                        'monthnineteen' => $order->monthnineteen,
                        'monthtwenty' => $order->monthtwenty,
                        'monthtwentyone' => $order->monthtwentyone,
                        'monthtwentytwo' => $order->monthtwentytwo,
                        'monthtwentythree' => $order->monthtwentythree,
                        'monthtwentyfour' => $order->monthtwentyfour,
                        'monthtwentyfive' => $order->monthtwentyfive,
                        'monthtwentysix' => $order->monthtwentysix,
                        'monthtwentyseven' => $order->monthtwentyseven,
                        'monthtwentyeight' => $order->monthtwentyeight,
                        'monthtwentynine' => $order->monthtwentynine,
                        'monththirthy' => $order->monththirthy,
                    ]);
                    break;
                case 36:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                        'monthseven' => $request->monthly,
                        'montheight' => $request->monthly,
                        'monthnine' => $request->monthly,
                        'monthten' => $request->monthly,
                        'montheleven' => $request->monthly,
                        'monthtwelve' => $request->monthly,
                        'monththirteen' => $request->monthly,
                        'monthfourteen' => $request->monthly,
                        'monthfifteen' => $request->monthly,
                        'monthsixteen' => $request->monthly,
                        'monthseventeen' => $request->monthly,
                        'montheigthteen' => $request->monthly,
                        'monthnineteen' => $request->monthly,
                        'monthtwenty' => $request->monthly,
                        'monthtwentyone' => $request->monthly,
                        'monthtwentytwo' => $request->monthly,
                        'monthtwentythree' => $request->monthly,
                        'monthtwentyfour' => $request->monthly,
                        'monthtwentyfive' => $request->monthly,
                        'monthtwentysix' => $request->monthly,
                        'monthtwentyseven' => $request->monthly,
                        'monthtwentyeight' => $request->monthly,
                        'monthtwentynine' => $request->monthly,
                        'monththirthy' => $request->monthly,
                        'monththirthyone' => $request->monthly,
                        'monththirthytwo' => $request->monthly,
                        'monththirthythree' => $request->monthly,
                        'monththirthyfour' => $request->monthly,
                        'monththirthyfive' => $request->monthly,
                        'monththirthysix' => $request->monthly
                     ]);
                     OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->thirtysixMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                        'monthseven' => $order->monthseven,
                        'montheight' => $order->montheight,
                        'monthnine' => $order->monthnine,
                        'monthten' => $order->monthten,
                        'montheleven' => $order->montheleven,
                        'monthtwelve' => $order->monthtwelve,
                        'monththirteen' => $order->monththirteen,
                        'monthfourteen' => $order->monthfourteen,
                        'monthfifteen' => $order->monthfifteen,
                        'monthsixteen' => $order->monthsixteen,
                        'monthseventeen' => $order->monthseventeen,
                        'montheigthteen' => $order->montheigthteen,
                        'monthnineteen' => $order->monthnineteen,
                        'monthtwenty' => $order->monthtwenty,
                        'monthtwentyone' => $order->monthtwentyone,
                        'monthtwentytwo' => $order->monthtwentytwo,
                        'monthtwentythree' => $order->monthtwentythree,
                        'monthtwentyfour' => $order->monthtwentyfour,
                        'monthtwentyfive' => $order->monthtwentyfive,
                        'monthtwentysix' => $order->monthtwentysix,
                        'monthtwentyseven' => $order->monthtwentyseven,
                        'monthtwentyeight' => $order->monthtwentyeight,
                        'monthtwentynine' => $order->monthtwentynine,
                        'monththirthy' => $order->monththirthy,
                        'monththirthyone' => $order->monththirthyone,
                        'monththirthytwo' => $order->monththirthytwo,
                        'monththirthythree' => $order->monththirthythree,
                        'monththirthyfour' => $order->monththirthyfour,
                        'monththirthyfive' => $order->monththirthyfive,
                        'monththirthysix' => $order->monththirthysix,
                    ]);
                    break;
                default:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',
                        'orderstatus' => FALSE,
                        'customerstatus' => 'Regular',
                        'due_date' => $dt,
                        'balancetobepaid' => $request->monthly,

                        'monthone' =>  $request->monthly,
                        'monthtwo' => $request->monthly,
                        'monththree' => $request->monthly,
                        'monthfour' => $request->monthly,
                        'monthfive' => $request->monthly,
                        'monthsix' => $request->monthly,
                    ]);
                    OrderTransactionDetails::create([
                        'order_id' => $order->id,
                        'unitmodelname' => $unit->modelname,
                        'brandname' => $unit->brand->brandname,
                        'brandrate' => $unit->brand->sixMonthRate,
                        'unitmodelprice' => $unit->price,
                        'initial_price' => $unit->price, 
                        'unitmodeldownpayment' => $request->downpayment,
                        'monthlypayment' => $request->monthly,
                        'monthsinstallment' => $request->monthsinstallment,
                        'paymentdate' => $paymentdate
                    ]);

                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'customerstatus' => 'Regular',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                    ]);

          }

        //   $ApplicantSketch = request('ApplicantSignature')->store('uploads', 'public');
        //    dd($order->customer->parent->Father);
          OrderCustomerInformation::create([
            'order_id' => $order->id,

            'FillOutDate' => $order->customer->FillOutDate,
            'FirstName' => $order->customer->FirstName,
            'MiddleName' => $order->customer->MiddleName,
            'LastName' => $order->customer->LastName,
            'Sex' => $order->customer->Sex,
            'Age' => $order->customer->Age,
            'Citizenship' => $order->customer->Citizenship,
            'BirthDate' => $order->customer->BirthDate,
            'Religion' => $order->customer->Religion,
            'CivilStatus' => $order->customer->CivilStatus,
            'TinNo' => $order->customer->TinNo,
            'id_ResNo' => $order->customer->id_ResNo,
            'IssueDate' => $order->customer->IssueDate,
            'PlaceIssue' => $order->customer->PlaceIssue,
            'NumberOfDependencies'  => $order->customer->NumberOfDependencies,
            'NumberofCreditReference'  => $order->customer->NumberofCreditReference,
            'HomePhoneNumber' => $order->customer->HomePhoneNumber,
            'OfficePhoneNumber' => $order->customer->OfficePhoneNumber,
            'MobileNumber' => $order->customer->MobileNumber,
            'email' => $order->customer->email,
            'SourceIncome' => $order->customer->SourceIncome,
            'ProvidedBy' => $order->customer->ProvidedBy,
            'EmployerName' => $order->customer->EmployerName,
            'WorkPosition' => $order->customer->WorkPosition,
            'WorkAddress' => $order->customer->WorkAddress,
            'WorkTelNumber' => $order->customer->WorkTelNumber,
            'DateEmployed' => $order->customer->DateEmployed,
            'Salary' => $order->customer->Salary,
            'UnitToBeUsedFor' => $order->customer->UnitToBeUsedFor,
            'ModeOfPayment' => $order->customer->ModeOfPayment,
            'ApplicantSketch' => $order->customer->ApplicantSketch,
            'ApplicantSignature' => $order->customer->ApplicantSignature,

            'PresentAddress' => $order->customer->address->PresentAddress,
            'LengthOfStay' => $order->customer->address->LengthOfStay,
            'HouseStatus' => $order->customer->address->HouseStatus,
            'HouseProvidedBy' => $order->customer->address->HouseProvidedBy,
            'LotStatus' => $order->customer->address->LotStatus,
            'LotProvidedBy' => $order->customer->address->LotProvidedBy,
            'OtherPropertiesTV' => $order->customer->address->OtherPropertiesTV,
            'OtherPropertiesRef' => $order->customer->address->OtherPropertiesRef,
            'OtherPropertiesStereoComponent' => $order->customer->address->OtherPropertiesStereoComponent,
            'OtherPropertiesGasRange' => $order->customer->address->OtherPropertiesGasRange,
            'OtherPropertiesMotorcycle' => $order->customer->address->OtherPropertiesMotorcycle,
            'OtherPropertiesComputer' => $order->customer->address->OtherPropertiesComputer,
            'OtherPropertiesFarmlot' => $order->customer->address->OtherPropertiesFarmlot,
            'FarmLotAddress' => $order->customer->address->FarmLotAddress,
            'FarmLotSize' => $order->customer->address->FarmLotSize,
            'ProvincialAddress' => $order->customer->address->ProvincialAddress,

            'Spouse' => $order->customer->spouse->Name,
            'SpouseAge' => $order->customer->spouse->Age,
            'SpouseProvincialAddress' => $order->customer->spouse->ProvincialAddress,
            'SpouseMobileNumber' => $order->customer->spouse->MobileNumber,
            'SpouseEmail' => $order->customer->spouse->Email,
            'SpouseEmployer' => $order->customer->spouse->Employer,
            'SpousePosition' => $order->customer->spouse->Position,
            'SpouseJobAddress' => $order->customer->spouse->JobAddress,
            'SpouseWorkTelNum' => $order->customer->spouse->WorkTelNum,
            'SpouseDateEmployed' => $order->customer->spouse->DateEmployed,
            'SpouseSalary' => $order->customer->spouse->Salary,
            'SpouseSignature' => $order->customer->spouse->SpouseSignature,

            'CoMakerName' => $order->customer->comaker->Name,
            'CoMakerAge' => $order->customer->comaker->Age,
            'CoMakerSex' => $order->customer->comaker->Sex,
            'CoMakerAddress' => $order->customer->comaker->Address,
            'CoMakeTelNumber' => $order->customer->comaker->CoMakeTelNumber,
            'CoMakerResidence' => $order->customer->comaker->Residence,
            'CoMakerResidenceProvidedBy' => $order->customer->comaker->ResidenceProvidedBy,
            'CoMakerCivilStatus' => $order->customer->comaker->CivilStatus,
            'CoMakerRelationship' => $order->customer->comaker->Relationship,
            'CoMakerBirthDate' => $order->customer->comaker->BirthDate,
            'CoMakerTin' => $order->customer->comaker->Tin,
            'CoMakerMobileNo' => $order->customer->comaker->MobileNo,
            'CoMakerEmployer' => $order->customer->comaker->Employer,
            'CoMakeDateEmployed' => $order->customer->comaker->CoMakeDateEmployed,
            'CoMakerPosition' => $order->customer->comaker->Position,
            'CoMakerTelNo' => $order->customer->comaker->TelNo,
            'CoMakerEmployerAddress' => $order->customer->comaker->EmployerAddress,
            'EmploymentStatus' => $order->customer->comaker->EmploymentStatus,
            'CoMakerCreditReference1' => $order->customer->comaker->CreditReference1,
            'CoMakerCreditReference2' => $order->customer->comaker->CreditReference2,
            'CoMakerCreditReference3' => $order->customer->comaker->CreditReference3,
            'CoMakerSketch' => $order->customer->comaker->Sketch,
            'CoMakerSignature' => $order->customer->comaker->Signature,

            'Father' => $order->customer->parent->Father,
            'Mother' => $order->customer->parent->Mother,
            'ParentAddresss' => $order->customer->parent->Addresss,
            'ParentNumber' => $order->customer->parent->MobileNumber,

            'PersonalReferenceName1' => $order->customer->personalreference[0]->PersonalReferenceName,
            'PersonalReferenceRelationship1' => $order->customer->personalreference[0]->PersonalReferenceRelationship,
            'PersonalReferenceNumber1' => $order->customer->personalreference[0]->PersonalReferenceNumber,
            'PersonalReferenceAddress1' => $order->customer->personalreference[0]->PersonalReferenceAddress,
            'PersonalReferenceName2' => $order->customer->personalreference[1]->PersonalReferenceName,
            'PersonalReferenceRelationship2' => $order->customer->personalreference[1]->PersonalReferenceRelationship,
            'PersonalReferenceNumber2' => $order->customer->personalreference[1]->PersonalReferenceNumber,
            'PersonalReferenceAddress2' => $order->customer->personalreference[1]->PersonalReferenceAddress,
            'PersonalReferenceName3' => $order->customer->personalreference[2]->PersonalReferenceName,
            'PersonalReferenceRelationship3' => $order->customer->personalreference[2]->PersonalReferenceRelationship,
            'PersonalReferenceNumber3' => $order->customer->personalreference[2]->PersonalReferenceNumber,
            'PersonalReferenceAddress3' => $order->customer->personalreference[2]->PersonalReferenceAddress,


            'DependentName1' => $order->customer->dependent[0]->Name,
            'DependentAge1' => $order->customer->dependent[0]->Age,
            'DependentGradeOcc1' => $order->customer->dependent[0]->GradeOcc,
            'DependentSchoolComp1' => $order->customer->dependent[0]->SchoolComp,
            'DependentName2' => $order->customer->dependent[1]->Name,
            'DependentAge2' => $order->customer->dependent[1]->Age,
            'DependentGradeOcc2' => $order->customer->dependent[1]->GradeOcc,
            'DependentSchoolComp2' => $order->customer->dependent[1]->SchoolComp,
            'DependentName3' => $order->customer->dependent[2]->Name,
            'DependentAge3' => $order->customer->dependent[2]->Age,
            'DependentGradeOcc3' => $order->customer->dependent[2]->GradeOcc,
            'DependentSchoolComp3' => $order->customer->dependent[2]->SchoolComp,
            'DependentName4' => $order->customer->dependent[3]->Name,
            'DependentAge4' => $order->customer->dependent[3]->Age,
            'DependentGradeOcc4' => $order->customer->dependent[3]->GradeOcc,
            'DependentSchoolComp4' => $order->customer->dependent[3]->SchoolComp,
            

            'StoreBank1' => $order->customer->creditreference[0]->StoreBank,
            'ItemLoadAmount1' => $order->customer->creditreference[0]->ItemLoadAmount,
            'Term1' => $order->customer->creditreference[0]->Term,
            'CreditDate1' => $order->customer->creditreference[0]->CreditDate,
            'CreditBalance1' => $order->customer->creditreference[0]->CreditBalance,
            'StoreBank2' => $order->customer->creditreference[1]->StoreBank,
            'ItemLoadAmount2' => $order->customer->creditreference[1]->ItemLoadAmount,
            'Term2' => $order->customer->creditreference[1]->Term,
            'CreditDate2' => $order->customer->creditreference[1]->CreditDate,
            'CreditBalance2' => $order->customer->creditreference[1]->CreditBalance,
            'StoreBank3' => $order->customer->creditreference[2]->StoreBank,
            'ItemLoadAmount3' => $order->customer->creditreference[2]->ItemLoadAmount,
            'Term3' => $order->customer->creditreference[2]->Term,
            'CreditDate3' => $order->customer->creditreference[2]->CreditDate,
            'CreditBalance3' => $order->customer->creditreference[2]->CreditBalance,
            'StoreBank4' => $order->customer->creditreference[2]->StoreBank,
            'ItemLoadAmount4' => $order->customer->creditreference[2]->ItemLoadAmount,
            'Term4' => $order->customer->creditreference[2]->Term,
            'CreditDate4' => $order->customer->creditreference[2]->CreditDate,
            'CreditBalance4' => $order->customer->creditreference[2]->CreditBalance,

      
        ]);
          if($request->flag == 1){
            return redirect()->route('admin.preorder.index')->with('bought', 'Preorder successfully added to order!');
          }else if($request->flag == 2){
            return back()->with('bought', 'Preorder successfully added to order!');
          }else{
            return redirect()->route('admin.order.index');
          }
          
    }
    public function show(order $order)
    {
        $order->load('orderhistory','ordertransactiondetails', 'ordercustomerinformation', 'customer');
        return view('admin.order.view', compact('order'));
    }
    public function edit(order $order)
    {
        $user = User::all();
        return view('admin.order.edit', compact('order','user'));
    }
    public function update(Request $request, order $order)
    {
        $request->validate([
            'deductbalance' => 'nullable|integer',
            'user_id' => 'nullable',
            'isMonthPay' => 'nullable'
        ]);
        
        $month_deducted = $order->months_payment;
        if ($request->isMonthPay == 1){
            $month_deducted = $order->months_payment - 1;
            $newbalance = $order->balance - $order->monthly_amount - $request->deductbalance;
        }else{
            $newbalance = $order->balance - $request->deductbalance;
        }


        $order -> update([
            'user_id' => $request->user_id,
            'balance' => $newbalance,
            'months_payment' => $month_deducted
        ]); 
        return redirect()->route('admin.order.index');

    }
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route('admin.order.index'); 
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $searchterm = $request->search_name;
        $category = $request->categories;
        $unit = Unit::all();
        $customer = Customer::whereHas('user', function(Builder $query){
            $query->where('userrole', 'Customer');
        })->get();

        if ($category == "Customer"){
            $order = Order::with('customer')->whereHas('customer', function(Builder $query) use ($searchterm){$query->where('FirstName','LIKE', "%{$searchterm}%")->orWhere('LastName','LIKE', "%{$searchterm}%");})->get();
        }else if($category == "Unit"){
            $order = Order::with('unit')->whereHas('unit', function(Builder $query) use ($searchterm){$query->where("modelname", 'LIKE', "%{$searchterm}%");})->get();

        }else if($category == "Ongoing"){
            $order = Order::with('customer')->where('orderstatus', '0')->whereHas('customer', function(Builder $query) use ($searchterm){$query->where('FirstName','LIKE', "%{$searchterm}%")->orWhere('LastName','LIKE', "%{$searchterm}%");})->get();
        }else if($category == "Delinquent"){
            $order = Order::with('customer')->where('customerstatus', 'Delinquent')->whereHas('customer', function(Builder $query) use ($searchterm){$query->where('FirstName','LIKE', "%{$searchterm}%")->orWhere('LastName','LIKE', "%{$searchterm}%");})->get();
        }

        return view('admin.order.index', compact('order', 'customer','unit'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("promos")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Promo Deleted successfully."]);
    }

    public function pdfOrderHistory(Order $order)
    {
        $order->load('orderhistory','ordertransactiondetails', 'customer');
        $pdf = Pdf::loadView('admin.order.pdfOrder', compact('order'));

        return $pdf->download('orders'. $order->ordertransactiondetails->unitmodelname . $order->id .'.pdf');
    }
    
    public function pdfOrderHistoryByDate(Order $order, Request $request)
    {
        // dd($order);
        $order->load('orderhistory','ordertransactiondetails', 'customer');
        // dd($request->dateafter);
        if($request->methodtype == "ByMonth"){
            // dd($order->ordertransactiondetails->unitmodelname);
            // $orders = Order::with('orderhistory','ordertransactiondetails', 'customer')->where('date_updated', '>=', $request->dateafter)->find($order->id);
            // $orders = Order::whereHas('orderhistory',function(Builder $query){$query->where('date_updated', '>=', '2022-11')->get();});
            // dd($orders);
            $orders = $order->orderhistory()->where('date_updated', '>=', $request->dateafter)->get();
                // dd( $order->orderhistory()->where('date_updated', '>=', $request->dateafter)->get());
        }elseif($request->methodtype == "ByDate"){
            $orders = $order->orderhistory()
                            ->whereBetween('date_updated', [$request->datebefore, $request->dateafter])
                            ->get();
        }
        $flag = array("dateafter" => $request->dateafter, "methodtype" => $request->methodtype, "datebefore" => $request->datebefore);
        $pdf = Pdf::loadView('admin.order.pdfOrder', compact('orders', 'order','flag'));
        
        
        return $pdf->download('orders'. $order->id . $request->dateafter. '.pdf');
    }

    public function queryPrice($id)
    {
        $unit = Unit::with('brand')->find($id);
        return response()->json($unit);
    }
    
    public function pay(Request $request, Order $order){
        // dd(asd);
        // dd($request->all());
        $request->validate([
            'payment' => 'required|int',
         ]);
        $customerstatus = 'Regular';
        $totalmonths = $order->ordertransactiondetails->monthsinstallment;
        $mo_current = $order->currentmonth;
        $mo_paid  = $order->monthspaid;
        $payment = $request->payment;
        $r_penalty = 1.04;
        $balancetobepaid = $order->ordertransactiondetails->monthlypayment;
        $monthlypayment = $order->ordertransactiondetails->monthlypayment;
        $dt = Carbon::now()->addMonth();
        switch($totalmonths){
            case '36':
                $balance_array = array(
                    $order->monthone,
                    $order->monthtwo,
                    $order->monththree,
                    $order->monthfour,
                    $order->monthfive,
                    $order->monthsix,
                    $order->monthseven,
                    $order->montheight,
                    $order->monthnine,
                    $order->monthten,
                    $order->montheleven,
                    $order->monthtwelve,
                    $order->monththirteen,
                    $order->monthfourteen,
                    $order->monthfifteen,
                    $order->monthsixteen,
                    $order->monthseventeen,
                    $order->montheigthteen,
                    $order->monthnineteen,
                    $order->monthtwenty,
                    $order->monthtwentyone,
                    $order->monthtwentytwo,
                    $order->monthtwentythree,
                    $order->monthtwentyfour,
                    $order->monthtwentyfive,
                    $order->monthtwentysix,
                    $order->monthtwentyseven,
                    $order->monthtwentyeight,
                    $order->monthtwentynine,
                    $order->monththirthy,
                    $order->monththirthyone,
                    $order->monththirthytwo,
                    $order->monththirthythree,
                    $order->monththirthyfour,
                    $order->monththirthyfive,
                    $order->monththirthysix
            );
                break;
            case '30':
                $balance_array = array(
                    $order->monthone,
                    $order->monthtwo,
                    $order->monththree,
                    $order->monthfour,
                    $order->monthfive,
                    $order->monthsix,
                    $order->monthseven,
                    $order->montheight,
                    $order->monthnine,
                    $order->monthten,
                    $order->montheleven,
                    $order->monthtwelve,
                    $order->monththirteen,
                    $order->monthfourteen,
                    $order->monthfifteen,
                    $order->monthsixteen,
                    $order->monthseventeen,
                    $order->montheigthteen,
                    $order->monthnineteen,
                    $order->monthtwenty,
                    $order->monthtwentyone,
                    $order->monthtwentytwo,
                    $order->monthtwentythree,
                    $order->monthtwentyfour,
                    $order->monthtwentyfive,
                    $order->monthtwentysix,
                    $order->monthtwentyseven,
                    $order->monthtwentyeight,
                    $order->monthtwentynine,
                    $order->monththirthy
            );
                break;
            case '24':
                $balance_array = array(
                    $order->monthone,
                    $order->monthtwo,
                    $order->monththree,
                    $order->monthfour,
                    $order->monthfive,
                    $order->monthsix,
                    $order->monthseven,
                    $order->montheight,
                    $order->monthnine,
                    $order->monthten,
                    $order->montheleven,
                    $order->monthtwelve,
                    $order->monththirteen,
                    $order->monthfourteen,
                    $order->monthfifteen,
                    $order->monthsixteen,
                    $order->monthseventeen,
                    $order->montheigthteen,
                    $order->monthnineteen,
                    $order->monthtwenty,
                    $order->monthtwentyone,
                    $order->monthtwentytwo,
                    $order->monthtwentythree,
                    $order->monthtwentyfour
            );
                break;
            case '18':
                $balance_array = array(
                    $order->monthone,
                    $order->monthtwo,
                    $order->monththree,
                    $order->monthfour,
                    $order->monthfive,
                    $order->monthsix,
                    $order->monthseven,
                    $order->montheight,
                    $order->monthnine,
                    $order->monthten,
                    $order->montheleven,
                    $order->monthtwelve,
                    $order->monththirteen,
                    $order->monthfourteen,
                    $order->monthfifteen,
                    $order->monthsixteen,
                    $order->monthseventeen,
                    $order->montheigthteen
            );
                break;
            case '12':
                $balance_array = array(
                    $order->monthone,
                    $order->monthtwo,
                    $order->monththree,
                    $order->monthfour,
                    $order->monthfive,
                    $order->monthsix,
                    $order->monthseven,
                    $order->montheight,
                    $order->monthnine,
                    $order->monthten,
                    $order->montheleven,
                    $order->monthtwelve
  
            );
                break;
            default:
            $balance_array = array(
                $order->monthone,
                $order->monthtwo,
                $order->monththree,
                $order->monthfour,
                $order->monthfive,
                $order->monthsix,
                $order->monthseven,
                $order->montheight,
                $order->monthnine,
                $order->monthten,
                $order->montheleven,
                $order->monthtwelve
        );
        }
        // check if paid
        if ($balance_array[$mo_paid] < 1){
            $order -> update(['orderstatus' => TRUE]);
            return redirect()->route('admin.order.show',$order); 
        }

        if($mo_paid >= $mo_current)
        {
            $balance_array[$mo_paid] -= $payment;
            $balance_array[$mo_paid] -= 200;
            while ($balance_array[$mo_paid] < 0) {
                $balance_array[$mo_paid+1] += $balance_array[$mo_paid];
                $balance_array[$mo_paid] = 0;
                $mo_paid += 1;
            }
            if ($balance_array[$mo_paid] == 0){
                $mo_paid += 1;
            }
        }
        else
        {
            $balance_array[$mo_paid] -= $payment;
            
            while ($balance_array[$mo_paid] < 0) {
                $balance_array[$mo_paid+1] += $balance_array[$mo_paid];
                $balance_array[$mo_paid] = 0;
                $mo_paid += 1;
            }
            if ($balance_array[$mo_paid] == 0){
                $mo_paid += 1;
            } 

            if($mo_current - $mo_paid >= 2 && $mo_current<=$totalmonths){
            $balancetobepaid = 0;
            for ($i=$mo_paid; $i<$mo_current; $i++)
            {
                $balance_array[$i] *= $r_penalty;
                $balancetobepaid = $balance_array[$i] + $balancetobepaid;        
            }
            $customerstatus = 'Delinquent';
            }
            elseif($mo_current - $mo_paid >= 2 && $mo_current>$totalmonths){
                $balancetobepaid = 0;
            for ($i=$mo_paid; $i<$totalmonths; $i++)
            {
                
                $balance_array[$i] *= $r_penalty;
                $balancetobepaid = $balance_array[$i] + $balancetobepaid;
                
            }
            $customerstatus = 'Delinquent';
            }
            
        }
        
        $mo_current += 1;
        $balance = array_sum($balance_array);
        
        // check if paid
        if ($balance_array[$mo_paid] < 1){
            $order -> update(['orderstatus' => TRUE]);
            return redirect()->route('admin.order.show',$order); 
        }

        switch($totalmonths){
            case '36':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    'due_date' => $dt,
                    'balancetobepaid' => $balancetobepaid,
        
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23],
                    'monthtwentyfive' => $balance_array[24],
                    'monthtwentysix' => $balance_array[25],
                    'monthtwentyseven' => $balance_array[26],
                    'monthtwentyeight' => $balance_array[27],
                    'monthtwentynine' => $balance_array[28],
                    'monththirthy' => $balance_array[29],
                    'monththirthyone' => $balance_array[30],
                    'monththirthytwo' => $balance_array[31],
                    'monththirthythree' => $balance_array[32],
                    'monththirthyfour' => $balance_array[33],
                    'monththirthyfive' => $balance_array[34],
                    'monththirthysix' => $balance_array[35]
                ]);
                OrderHistory::create([
                    'order_id' => $order->id,
                    'balance' =>$balance ,
                    'currentmonth' => $mo_current,
                    'payment' => $payment,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    
        
                    'date_updated' => $order->updated_at,
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23],
                    'monthtwentyfive' => $balance_array[24],
                    'monthtwentysix' => $balance_array[25],
                    'monthtwentyseven' => $balance_array[26],
                    'monthtwentyeight' => $balance_array[27],
                    'monthtwentynine' => $balance_array[28],
                    'monththirthy' => $balance_array[29],
                    'monththirthyone' => $balance_array[30],
                    'monththirthytwo' => $balance_array[31],
                    'monththirthythree' => $balance_array[32],
                    'monththirthyfour' => $balance_array[33],
                    'monththirthyfive' => $balance_array[34],
                    'monththirthysix' => $balance_array[35]
                ]);
                break;
            case '30':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    'due_date' => $dt,
                    'balancetobepaid' => $balancetobepaid,
        
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23],
                    'monthtwentyfive' => $balance_array[24],
                    'monthtwentysix' => $balance_array[25],
                    'monthtwentyseven' => $balance_array[26],
                    'monthtwentyeight' => $balance_array[27],
                    'monthtwentynine' => $balance_array[28],
                    'monththirthy' => $balance_array[29]
                ]);
                OrderHistory::create([
                    'order_id' => $order->id,
                    'balance' =>$balance ,
                    'currentmonth' => $mo_current,
                    'payment' => $payment,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
        
                    'date_updated' => $order->updated_at,
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23],
                    'monthtwentyfive' => $balance_array[24],
                    'monthtwentysix' => $balance_array[25],
                    'monthtwentyseven' => $balance_array[26],
                    'monthtwentyeight' => $balance_array[27],
                    'monthtwentynine' => $balance_array[28],
                    'monththirthy' => $balance_array[29]
                ]);
                break;
            case '24':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    'due_date' => $dt,
                    'balancetobepaid' => $balancetobepaid,
        
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23]
                ]);
                OrderHistory::create([
                    'order_id' => $order->id,
                    'balance' =>$balance ,
                    'currentmonth' => $mo_current,
                    'payment' => $payment,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
        
                    'date_updated' => $order->updated_at,
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17],
                    'monthnineteen' => $balance_array[18],
                    'monthtwenty' => $balance_array[19],
                    'monthtwentyone' => $balance_array[20],
                    'monthtwentytwo' => $balance_array[21],
                    'monthtwentythree' => $balance_array[22],
                    'monthtwentyfour' => $balance_array[23]
                ]);
                break;
            case '18':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    'due_date' => $dt,
                    'balancetobepaid' => $balancetobepaid,
        
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17]
                ]);
                OrderHistory::create([
                    'order_id' => $order->id,
                    'balance' =>$balance ,
                    'currentmonth' => $mo_current,
                    'payment' => $payment,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
        
                    'date_updated' => $order->updated_at,
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11],
                    'monththirteen' => $balance_array[12],
                    'monthfourteen' => $balance_array[13],
                    'monthfifteen' => $balance_array[14],
                    'monthsixteen' => $balance_array[15],
                    'monthseventeen' => $balance_array[16],
                    'montheigthteen' => $balance_array[17]
                ]);
                break;
            case '12':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
                    'due_date' => $dt,
                    'balancetobepaid' => $balancetobepaid,
        
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11]
                ]);
                OrderHistory::create([
                    'order_id' => $order->id,
                    'balance' =>$balance ,
                    'currentmonth' => $mo_current,
                    'payment' => $payment,
                    'monthspaid' => $mo_paid,
                    'customerstatus' => $customerstatus,
        
                    'date_updated' => $order->updated_at,
                    'monthone' =>  $balance_array[0],
                    'monthtwo' => $balance_array[1],
                    'monththree' => $balance_array[2],
                    'monthfour' => $balance_array[3],
                    'monthfive' => $balance_array[4],
                    'monthsix' => $balance_array[5],
                    'monthseven' => $balance_array[6],
                    'montheight' => $balance_array[7],
                    'monthnine' => $balance_array[8],
                    'monthten' => $balance_array[9],
                    'montheleven' => $balance_array[10],
                    'monthtwelve' => $balance_array[11]
                ]);
                break;
            default:
            $order -> update([
                'balance' => $balance,
                'currentmonth' => $mo_current,
                'monthspaid' => $mo_paid,
                'customerstatus' => $customerstatus,
                'due_date' => $dt,
                'balancetobepaid' => $balancetobepaid,
    
                'monthone' =>  $balance_array[0],
                'monthtwo' => $balance_array[1],
                'monththree' => $balance_array[2],
                'monthfour' => $balance_array[3],
                'monthfive' => $balance_array[4],
                'monthsix' => $balance_array[5]
            ]);
            OrderHistory::create([
                'order_id' => $order->id,
                'balance' =>$balance ,
                'currentmonth' => $mo_current,
                'payment' => $payment,
                'monthspaid' => $mo_paid,
                'customerstatus' => $customerstatus,
    
                'date_updated' => $order->updated_at,
                'monthone' =>  $balance_array[0],
                'monthtwo' => $balance_array[1],
                'monththree' => $balance_array[2],
                'monthfour' => $balance_array[3],
                'monthfive' => $balance_array[4],
                'monthsix' => $balance_array[5]
            ]);
        }
        return redirect()->back(); 

    }
    public function getordersdelinquent(Request $request)
    {
        $order = Order::whereBetween('created_at', [$request->timebefore, $request->timeafter])->where('customerstatus', 'Delinquent')->get();
        return response()->json($order->count());
    }
    public function getorders(Request $request)
    {
        $order = Order::whereBetween('created_at', [$request->timebefore, $request->timeafter])->get();
        return response()->json($order->count());
    }
    public function pdfOrders(){

        $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->get();
        // dd($order);
        $pdf = Pdf::loadView('admin.order.pdfAllOrder', compact('order'));

        return $pdf->download('All Orders' .'.pdf');
    }

    public function pdfOrderByDate( Request $request)
    {
        // $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->get();
        

        if($request->methodtype == "ByMonth"){
            $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->where('created_at', '>=', $request->dateafter)->get();
        }elseif($request->methodtype == "ByDate"){

            // $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->whereBetween('date_created', [$datebefore, $dateafter])->get();
            $order = Order::with('orderhistory','ordertransactiondetails', 'customer')->whereBetween('created_at', [$request->datebefore, $request->dateafter])->get();
        }
        // dd($request->all()); 
        $flag = array("dateafter" => $request->dateafter, "methodtype" => $request->methodtype, "datebefore" => $request->datebefore);
        $pdf = Pdf::loadView('admin.order.pdfAllOrder', compact('order', 'flag'));
        
        return $pdf->download('All orders '. $request->dateafter.'.pdf');
    }

}
