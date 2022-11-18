@extends('layouts.collectorlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex justify-content-between mb-2">
                        <h1 class="h2"><b>List Assigned Customers</b></h1>
                        <form method="POST" action={{route("admin.user.search")}}>
                            @csrf 
                            <div class="d-flex">
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                                <button type="submit" class="btn btn-outline-primary my-sm-0">search</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Customer Name</th>
                        <th>Total Order Count</th>
                        <th>Orders Active</th>
                        <th>Orders Need to pay on</th>
                        <th>Orders</th>
                        {{-- <th>Last Payment</th>
                        <th>Payment Due</th>
                        <th>Amount to be paid this month</th>
                        <th>Pay</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collector->customer as $customer)
                        <tr>
                            <td>{{$customer->FirstName}} {{$customer->LastName}}</td>
                            <td>{{$customer->order->count()}}</td>
                            <td>{{$customer->order->where('orderstatus', FALSE)->count()}}</td>
                            <td>
                                @if ($customer->order->where('orderstatus', FALSE)->count())
                                    {{$customer->order->where('orderstatus', FALSE)->sortBy('due_date')->first()->due_date}}
                                @endif
                            </td>
                            <td>
                                <form method="GET" action="{{ route('collector.inspector.edit', $customer) }}">
                                    <button type="submit" class="btn btn-primary" style=""><i class="fa-solid fa-file-pen"></i> Orders</button>
                                </form>
                            </td>
                        </tr>    
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection