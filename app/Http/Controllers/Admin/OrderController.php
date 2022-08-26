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

        //   $unit = Unit::find($request->unit_id)->load('brand');
        //   dd($unit->brand->brandname);
        
          $unit = Unit::find($request->unit_id)->load('brand');
        //   dd($unit->brand->brandname);
          //$brandname = $unit->brand->brandname;

          //dd($unit->brand->brandname);
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
                        'date_updated' => $order->updated_at,
                        'monthone' => $order->monthone,
                        'monthtwo' => $order->monthtwo,
                        'monththree' => $order->monththree,
                        'monthfour' => $order->monthfour,
                        'monthfive' => $order->monthfive,
                        'monthsix' => $order->monthsix,
                    ]);

          }

        //  $unit = Unit::find($request->unit_id);

        //  $order = Order::create([
        //     'customer_id' => $request->customer_id,
        //     'unit_id' => $request->unit_id,
        //     'IsInstallment' => $request->IsInstallment,
        //     'monthly_amount' => $request->monthly_amount,
        //     'months_payment' => $request->months_payment,
        //     'user_id' => $request->user_id,
        //     'initial_price' => $unit->price,
        //     'balance' => $unit->price
        //  ]);

         
          return redirect()->route('admin.order.index');
    }
    public function show(order $order)
    {
        return view('admin.order.view', compact('order'));
    }
    public function edit(order $order)
    {
        $user = User::all();
        return view('admin.order.edit', compact('order','user'));
    }
    public function update(Request $request, order $order)
    {
        // dd($request->all());
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
        //dd($order);
        //$pdf = Pdf::loadView('admin.order.view', compact('order'));
        $pdf = Pdf::loadView('admin.order.pdfOrder', compact('order'));
        
        // $pdf = Pdf::loadView('admin.order.view');
        // $pdf = Pdf::loadView('FillOutform');
        return $pdf->download('orders.pdf');
    }

    public function queryPrice($id)
    {
        $where = array('id' => $id);
        $unit  = Unit::where($where)->first()->load('brand');
        //dd($unit);
         //$unit = Unit::all();
        // return Response::json($unit);
        return response()->json($unit);
    }
    
}
