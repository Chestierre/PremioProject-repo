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

            <h1>List of Orders:</h1>
            <p>{{$user->customer->FirstName}} {{$user->customer->LastName}}</p>


    </div>
    <div class="sortCategory">
        
        {{-- @isset ($flag)
            @if($flag['methodtype'] == "ByDate")
                <p>{{\Carbon\Carbon::parse($flag['datebefore'])->format('F d, Y')}} - {{\Carbon\Carbon::parse($flag['dateafter'])->format('F d, Y')}}</p>
            @else
                <p>All dates after {{\Carbon\Carbon::parse($flag['dateafter'])->format('F d, Y')}}</p>
            @endif
            
        @endisset --}}

        @empty($flag)
            <p>{{\Carbon\Carbon::parse($user->customer->order->first()->created_at)->format('F d, Y')}} - {{\Carbon\Carbon::parse($user->customer->order->last()->created_at)->format('F d, Y')}}</p>
        @endempty

        
    </div>
    <table class="styled-table"> 
        <thead>
            <tr>
                <th>Customer</th>
                <th>Unit</th>
                <th>Balance</th>
                <th>Transaction Date</th>
                <th>Order Status</th>
                <th>Customer Status</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @isset ($flag)
                @foreach ($order as $order)
                    <tr>
                        <td>{{$order->ordercustomerinformation->FirstName}} {{$order->ordercustomerinformation->LastName}}</td>
                        <td>{{$order->ordertransactiondetails->unitmodelname}}</td>
                        <td><span style="font-family: DejaVu Sans;">&#x20B1;</span> {{number_format($order->balance)}}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}</td>
                        
                        @if ($order->orderstatus == 0)
                            <td>Ongoing Installment</td>
                        @else
                            <td>Paid</td>    
                        @endif
        
                        <td>{{$order->customerstatus}}</td>
                        <td>{{ \Carbon\Carbon::parse($order->due_date)->format('F d, Y')}}</td>
                    </tr>
                @endforeach
            @endisset

            @empty($flag)
            @foreach ($user->customer->order as $order)
            <tr>
                <td>{{$order->ordercustomerinformation->FirstName}} {{$order->ordercustomerinformation->LastName}}</td>
                <td>{{$order->ordertransactiondetails->unitmodelname}}</td>
                <td><span style="font-family: DejaVu Sans;">&#x20B1;</span> {{number_format($order->balance)}}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}</td>
                
                @if ($order->orderstatus == 0)
                    <td>Ongoing Installment</td>
                @else
                    <td>Paid</td>    
                @endif

                <td>{{$order->customerstatus}}</td>
                <td>{{ \Carbon\Carbon::parse($order->due_date)->format('F d, Y')}}</td>
            </tr>
            @endforeach
            @endempty
           

        </tbody>

    </table>

</body>
</html>