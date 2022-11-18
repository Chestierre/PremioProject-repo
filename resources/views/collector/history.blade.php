@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex mb-2 justify-content-between">
            <h2 class=""><b>Payment History</b></h2>
            <div class="">
                <form method="GET"action="{{ url()->previous()}}">
                    <button type="submit" class="btn btn-success w-100"><i class="fa-solid primary"></i>Go Back</button>    
                </form>
            </div>
        </div>
        
        
    </div>
    
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Date Updated</th>
                <th>Current Month</th>
                <th>Balance</th>
                <th>Payment</th>
                <th>Payment Need to be paid</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($order->orderhistory as $orderhistory)
                <tr>
                    <td>{{$orderhistory->date_updated}}</td>
                    <td>{{$orderhistory->currentmonth}}</td>
                    <td>&#8369 {{number_format($orderhistory->balance)}}</td>
                    <td>&#8369 {{number_format($orderhistory->payment)}}</td>
                    <td>
                        @if($orderhistory->monthone)1st month: month: {{number_format($orderhistory->monthone)}} ||<br > @endif
                        @if($orderhistory->monthtwo)2nd month: {{number_format($orderhistory->monthtwo)}} ||<br > @endif
                        @if($orderhistory->monththree)3rd month: {{number_format($orderhistory->monththree)}} ||<br > @endif
                        @if($orderhistory->monthfour)4th month: {{number_format($orderhistory->monthfour)}} ||<br > @endif
                        @if($orderhistory->monthfive)5th month: {{number_format($orderhistory->monthfive)}} ||<br > @endif
                        @if($orderhistory->monthsix)6th month: {{number_format($orderhistory->monthsix)}} ||<br > @endif
                        @if($orderhistory->monthseven)7th month: {{number_format($orderhistory->monthseven)}} ||<br > @endif
                        @if($orderhistory->montheight)8th month: {{number_format($orderhistory->montheight)}} ||<br > @endif
                        @if($orderhistory->monthnine)9th month: {{number_format($orderhistory->monthnine)}} ||<br > @endif
                        @if($orderhistory->monthten)10th month: {{number_format($orderhistory->monthten)}} ||<br > @endif
                        @if($orderhistory->montheleven) 11th month: {{number_format($orderhistory->montheleven)}} ||<br > @endif
                        @if($orderhistory->monthtwelve) 12th month: {{number_format($orderhistory->monthtwelve)}} ||<br > @endif
                        @if($orderhistory->monththirteen) 13th month: {{number_format($orderhistory->monththirteen)}} ||<br > @endif
                        @if($orderhistory->monthfourteen) 14th month: {{number_format($orderhistory->monthfourteen)}} ||<br > @endif
                        @if($orderhistory->monthfifteen) 15th month: {{number_format($orderhistory->monthfifteen)}} ||<br > @endif
                        @if($orderhistory->monthsixteen) 16th month: {{number_format($orderhistory->monthsixteen)}} ||<br > @endif
                        @if($orderhistory->monthseventeen) 17th month: {{number_format($orderhistory->monthseventeen)}} ||<br > @endif
                        @if($orderhistory->montheigthteen) 18th month: {{number_format($orderhistory->montheigthteen)}} ||<br > @endif
                        @if($orderhistory->monthnineteen) 19th month: {{number_format($orderhistory->monthnineteen)}} ||<br > @endif
                        @if($orderhistory->monthtwentyone) 20th month: {{number_format($orderhistory->monthtwenty)}} ||<br > @endif
                        @if($orderhistory->monthtwentyone) 21th month: {{number_format($orderhistory->monthtwentyone)}} ||<br > @endif
                        @if($orderhistory->monthtwentytwo) 22th month: {{number_format($orderhistory->monthtwentytwo)}} ||<br > @endif
                        @if($orderhistory->monthtwentythree) 23th month: {{number_format($orderhistory->monthtwentythree)}} ||<br > @endif
                        @if($orderhistory->monthtwentyfour) 24th month: {{number_format($orderhistory->monthtwentyfour)}} ||<br > @endif
                        @if($orderhistory->monthtwentyfive) 25th month: {{number_format($orderhistory->monthtwentyfive)}} ||<br > @endif
                        @if($orderhistory->monthtwentysix) 26th month: {{number_format($orderhistory->monthtwentysix)}} ||<br > @endif
                        @if($orderhistory->monthtwentyseven) 27th month: {{number_format($orderhistory->monthtwentyseven)}} ||<br > @endif
                        @if($orderhistory->monthtwentyeight) 28th month: {{number_format($orderhistory->monthtwentyeight)}} ||<br > @endif
                        @if($orderhistory->monthtwentynine) 29th month: {{number_format($orderhistory->monthtwentynine)}} ||<br > @endif
                        @if($orderhistory->monththirthy) 30th month: {{number_format($orderhistory->monththirthy)}} ||<br > @endif
                        @if($orderhistory->monththirthyone) 31th month: {{number_format($orderhistory->monththirthyone)}} ||<br > @endif
                        @if($orderhistory->monththirthytwo) 32th month: {{number_format($orderhistory->monththirthytwo)}} ||<br > @endif
                        @if($orderhistory->monththirthythree) 33th month: {{number_format($orderhistory->monththirthythree)}} ||<br > @endif
                        @if($orderhistory->monththirthyfour) 34th month: {{number_format($orderhistory->monththirthyfour)}} ||<br > @endif
                        @if($orderhistory->monththirthyfive) 35th month: {{number_format($orderhistory->monththirthyfive)}} ||<br > @endif
                        @if($orderhistory->monththirthysix) 36th month: {{number_format($orderhistory->monththirthysix)}} ||<br > @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
