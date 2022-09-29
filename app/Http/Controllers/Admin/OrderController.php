<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Unit;
use App\Models\Customer;
use App\Models\User;
use App\Models\OrderTransactionDetails;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        $order = Order::all();
        $customer = Customer::all();
        $user = User::all();
        return view('admin.order.index', compact('unit','order','customer', 'user'));
    }
    public function create()
    {
    }
    
    public function store(Request $request)
    {

         $request->validate([
             'customer_id' => 'required',
             'unit_id' => 'required',
             'downpayment' => 'required|integer',
             'monthsinstallment' => 'required|integer',
             'monthly' => 'required|integer',
             'balance' => 'required|integer'

          ]);
          $unit = Unit::with('brand')->find($request->unit_id);
          switch($request->monthsinstallment){
                case 12:
                    $order = Order::create([
                        'customer_id' => $request->customer_id,
                        'unit_id' => $request->unit_id,
                        'balance' => $request->balance,
                        'currentmonth' => '0',
                        'monthspaid' => '0',

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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);
                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
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
                        'monthsinstallment' => $request->monthsinstallment
                    ]);

                    OrderHistory::create([
                        'order_id' => $order->id,
                        'balance' => $order->balance,
                        'currentmonth' => '0',
                        'payment' => '0',
                        'monthspaid' => '0',
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                    ]);

          }       
          return redirect()->route('admin.order.index');
    }
    public function show(order $order)
    {
        $order->load('orderhistory','ordertransactiondetails', 'ordercustomerinformation');
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
        
        $order = order::query()
                ->where('orderTitle', 'LIKE', "%{$request->search_name}%")
                ->get();
        return view('admin.order.index', compact('order'));
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("promos")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Promo Deleted successfully."]);
    }

    public function pdfOrderHistory(Order $order)
    {
        $order->load('orderhistory','ordertransactiondetails');
        //$pdf = Pdf::loadView('admin.order.view', compact('order'));
        $pdf = Pdf::loadView('admin.order.pdfOrder', compact('order'));
        
        // $pdf = Pdf::loadView('admin.order.view');
        // $pdf = Pdf::loadView('FillOutform');
        return $pdf->download('orders.pdf');
    }
    
    public function pdfOrderHistoryByDate(Order $order, Request $request)
    {
        // dd($request->all());
        // $order->load('orderhistory','ordertransactiondetails');
        $order->load('orderhistory','ordertransactiondetails');
        if($request->methodtype == "ByMonth"){
            //dd('byMonth');
            $orders = $order->orderhistory()
                    ->where('date_updated', '>=', $request->dateafter)
                    ->get();
        }elseif($request->methodtype == "ByDate"){
            $orders = $order->orderhistory()
                            ->whereBetween('date_updated', [$request->datebefore, $request->dateafter])
                            ->get();
        }
        $flag = array("dateafter" => $request->dateafter, "methodtype" => $request->methodtype, "datebefore" => $request->datebefore);
        $pdf = Pdf::loadView('admin.order.pdfOrder', compact('orders', 'flag'));
        
        return $pdf->download('orders.pdf');
    }

    public function queryPrice($id)
    {
        $unit = Unit::with('brand')->find($id);
        return response()->json($unit);
    }
    
    public function pay(Request $request, Order $order){
  
        $request->validate([
            'payment' => 'required|int',
         ]);

        $totalmonths = $order->ordertransactiondetails->monthsinstallment;
        $mo_current = $order->currentmonth;
        $mo_paid  = $order->monthspaid;
        $payment = $request->payment;
        $r_penalty = 1.04;
        $monthlypayment = $order->ordertransactiondetails->monthlypayment;
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
            for ($i=$mo_paid; $i<$mo_current; $i++)
            {
                $balance_array[$i] *= $r_penalty;
            }}
            elseif($mo_current - $mo_paid >= 2 && $mo_current>$totalmonths){
            for ($i=$mo_paid; $i<$totalmonths; $i++)
            {
                $balance_array[$i] *= $r_penalty;
            }

            }
        }
        
        $mo_current += 1;
        $balance = array_sum($balance_array);
        

        switch($totalmonths){
            case '36':
                $order -> update([
                    'balance' => $balance,
                    'currentmonth' => $mo_current,
                    'monthspaid' => $mo_paid,
        
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
    
                'date_updated' => $order->updated_at,
                'monthone' =>  $balance_array[0],
                'monthtwo' => $balance_array[1],
                'monththree' => $balance_array[2],
                'monthfour' => $balance_array[3],
                'monthfive' => $balance_array[4],
                'monthsix' => $balance_array[5]
            ]);
        }
        return redirect()->route('admin.order.show',$order); 

    }
}
