<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premio</title>

    <style>
        .styled-table {
            border-collapse: collapse;
            /* margin: 25px 0; */
            margin: auto;
            font-size: 0.9em;
            /* font-family: sans-serif;
             */
            font-family: "Times New Roman", Times, serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 14px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        div.title {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }
        div.sortCategory {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="title">

            <h1>Order History: {{$order->ordertransactiondetails->unitmodelname}}</h1>
            <p>{{$order->customer->FirstName}} {{$order->customer->LastName}}</p>


    </div>
    <div class="sortCategory">
        {{-- {{$flag['dateafter']}} --}}
        @isset ($flag)
            @if($flag['methodtype'] == "ByDate")
                <p>{{\Carbon\Carbon::parse($flag['datebefore'])->format('F d, Y')}} - {{\Carbon\Carbon::parse($flag['dateafter'])->format('F d, Y')}}</p>
            @else
                <p>All dates after {{\Carbon\Carbon::parse($flag['dateafter'])->format('F d, Y')}}</p>
            @endif
            
        @endisset

        @empty($flag)
            <p>{{\Carbon\Carbon::parse($order->orderhistory->first()->date_updated)->format('F d, Y')}} - {{\Carbon\Carbon::parse($order->orderhistory->last()->date_created)->format('F d, Y')}}</p>
        @endempty

        
    </div>
    <table class="styled-table"> 
        <thead>
            <tr>
                <th>Date and Time</th>
                <th>Current Month</th>
                <th>Balance</th>
                <th>Payment</th>
                <th>Payment Need to be paid</th>
            </tr>
        </thead>
        <tbody>
            @isset ($flag)
                @foreach ($orders as $orderhistory)
                <tr>
                    <td>{{\Carbon\Carbon::parse($orderhistory->date_updated)->format('F d, Y')}}</td>
                    <td>{{$orderhistory->currentmonth}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#x20B1;</span>{{number_format($orderhistory->balance)}}</td>
                    <td><span style="font-family: DejaVu Sans;">&#x20B1;</span>{{number_format($orderhistory->payment)}}</td>
                    <td>
                        @if($orderhistory->monthone) {{number_format($orderhistory->monthone)}} || @endif
                        @if($orderhistory->monthtwo) {{number_format($orderhistory->monthtwo)}} || @endif
                        @if($orderhistory->monththree) {{number_format($orderhistory->monththree)}} || @endif
                        @if($orderhistory->monthfour) {{number_format($orderhistory->monthfour)}} || @endif
                        @if($orderhistory->monthfive) {{number_format($orderhistory->monthfive)}} || @endif
                        @if($orderhistory->monthsix) {{number_format($orderhistory->monthsix)}} || @endif
                        @if($orderhistory->monthseven) {{number_format($orderhistory->monthseven)}} || @endif
                        @if($orderhistory->montheight) {{number_format($orderhistory->montheight)}} || @endif
                        @if($orderhistory->monthnine) {{number_format($orderhistory->monthnine)}} || @endif
                        @if($orderhistory->monthten) {{number_format($orderhistory->monthten)}} || @endif
                        @if($orderhistory->montheleven) {{number_format($orderhistory->montheleven)}} || @endif
                        @if($orderhistory->monthtwelve) {{number_format($orderhistory->monthtwelve)}} || @endif
                        @if($orderhistory->monththirteen) {{number_format($orderhistory->monththirteen)}} || @endif
                        @if($orderhistory->monthfourteen) {{number_format($orderhistory->monthfourteen)}} || @endif
                        @if($orderhistory->monthfifteen) {{number_format($orderhistory->monthfifteen)}} || @endif
                        @if($orderhistory->monthsixteen) {{number_format($orderhistory->monthsixteen)}} || @endif
                        @if($orderhistory->monthseventeen) {{number_format($orderhistory->monthseventeen)}} || @endif
                        @if($orderhistory->montheigthteen) {{number_format($orderhistory->montheigthteen)}} || @endif
                        @if($orderhistory->monthnineteen) {{number_format($orderhistory->monthnineteen)}} || @endif
                        @if($orderhistory->monthtwentyone) {{number_format($orderhistory->monthtwentyone)}} || @endif
                        @if($orderhistory->monthtwentytwo) {{number_format($orderhistory->monthtwentytwo)}} || @endif
                        @if($orderhistory->monthtwentythree) {{number_format($orderhistory->monthtwentythree)}} || @endif
                        @if($orderhistory->monthtwentyfour) {{number_format($orderhistory->monthtwentyfour)}} || @endif
                        @if($orderhistory->monthtwentyfive) {{number_format($orderhistory->monthtwentyfive)}} || @endif
                        @if($orderhistory->monthtwentysix) {{number_format($orderhistory->monthtwentysix)}} || @endif
                        @if($orderhistory->monthtwentyseven) {{number_format($orderhistory->monthtwentyseven)}} || @endif
                        @if($orderhistory->monthtwentyeight) {{number_format($orderhistory->monthtwentyeight)}} || @endif
                        @if($orderhistory->monthtwentynine) {{number_format($orderhistory->monthtwentynine)}} || @endif
                        @if($orderhistory->monththirthy) {{number_format($orderhistory->monththirthy)}} || @endif
                        @if($orderhistory->monththirthyone) {{number_format($orderhistory->monththirthyone)}} || @endif
                        @if($orderhistory->monththirthytwo) {{number_format($orderhistory->monththirthytwo)}} || @endif
                        @if($orderhistory->monththirthythree) {{number_format($orderhistory->monththirthythree)}} || @endif
                        @if($orderhistory->monththirthyfour) {{number_format($orderhistory->monththirthyfour)}} || @endif
                        @if($orderhistory->monththirthyfive) {{number_format($orderhistory->monththirthyfive)}} || @endif
                        @if($orderhistory->monththirthysix) {{number_format($orderhistory->monththirthysix)}} || @endif
                    </td>
                </tr>
                @endforeach
            @endisset

            @empty($flag)
            @foreach ($order->orderhistory as $orderhistory)
            <tr>    
                <td>{{\Carbon\Carbon::parse($orderhistory->date_created)->format('F d, Y')}}</td>
                <td>{{$orderhistory->currentmonth}}</td>
                <td><span style="font-family: DejaVu Sans;">&#x20B1;</span>{{number_format($orderhistory->balance)}}</td>
                <td><span style="font-family: DejaVu Sans;">&#x20B1;</span>{{number_format($orderhistory->payment)}}</td>
                <td>
                    @if($orderhistory->monthone) {{number_format($orderhistory->monthone)}} || @endif
                    @if($orderhistory->monthtwo) {{number_format($orderhistory->monthtwo)}} || @endif
                    @if($orderhistory->monththree) {{number_format($orderhistory->monththree)}} || @endif
                    @if($orderhistory->monthfour) {{number_format($orderhistory->monthfour)}} || @endif
                    @if($orderhistory->monthfive) {{number_format($orderhistory->monthfive)}} || @endif
                    @if($orderhistory->monthsix) {{number_format($orderhistory->monthsix)}} || @endif
                    @if($orderhistory->monthseven) {{number_format($orderhistory->monthseven)}} || @endif
                    @if($orderhistory->montheight) {{number_format($orderhistory->montheight)}} || @endif
                    @if($orderhistory->monthnine) {{number_format($orderhistory->monthnine)}} || @endif
                    @if($orderhistory->monthten) {{number_format($orderhistory->monthten)}} || @endif
                    @if($orderhistory->montheleven) {{number_format($orderhistory->montheleven)}} || @endif
                    @if($orderhistory->monthtwelve) {{number_format($orderhistory->monthtwelve)}} || @endif
                    @if($orderhistory->monththirteen) {{number_format($orderhistory->monththirteen)}} || @endif
                    @if($orderhistory->monthfourteen) {{number_format($orderhistory->monthfourteen)}} || @endif
                    @if($orderhistory->monthfifteen) {{number_format($orderhistory->monthfifteen)}} || @endif
                    @if($orderhistory->monthsixteen) {{number_format($orderhistory->monthsixteen)}} || @endif
                    @if($orderhistory->monthseventeen) {{number_format($orderhistory->monthseventeen)}} || @endif
                    @if($orderhistory->montheigthteen) {{number_format($orderhistory->montheigthteen)}} || @endif
                    @if($orderhistory->monthnineteen) {{number_format($orderhistory->monthnineteen)}} || @endif
                    @if($orderhistory->monthtwentyone) {{number_format($orderhistory->monthtwentyone)}} || @endif
                    @if($orderhistory->monthtwentytwo) {{number_format($orderhistory->monthtwentytwo)}} || @endif
                    @if($orderhistory->monthtwentythree) {{number_format($orderhistory->monthtwentythree)}} || @endif
                    @if($orderhistory->monthtwentyfour) {{number_format($orderhistory->monthtwentyfour)}} || @endif
                    @if($orderhistory->monthtwentyfive) {{number_format($orderhistory->monthtwentyfive)}} || @endif
                    @if($orderhistory->monthtwentysix) {{number_format($orderhistory->monthtwentysix)}} || @endif
                    @if($orderhistory->monthtwentyseven) {{number_format($orderhistory->monthtwentyseven)}} || @endif
                    @if($orderhistory->monthtwentyeight) {{number_format($orderhistory->monthtwentyeight)}} || @endif
                    @if($orderhistory->monthtwentynine) {{number_format($orderhistory->monthtwentynine)}} || @endif
                    @if($orderhistory->monththirthy) {{number_format($orderhistory->monththirthy)}} || @endif
                    @if($orderhistory->monththirthyone) {{number_format($orderhistory->monththirthyone)}} || @endif
                    @if($orderhistory->monththirthytwo) {{number_format($orderhistory->monththirthytwo)}} || @endif
                    @if($orderhistory->monththirthythree) {{number_format($orderhistory->monththirthythree)}} || @endif
                    @if($orderhistory->monththirthyfour) {{number_format($orderhistory->monththirthyfour)}} || @endif
                    @if($orderhistory->monththirthyfive) {{number_format($orderhistory->monththirthyfive)}} || @endif
                    @if($orderhistory->monththirthysix) {{number_format($orderhistory->monththirthysix)}} || @endif
                </td>
            </tr>
            @endforeach
            @endempty
           

        </tbody>

    </table>

</body>
</html>