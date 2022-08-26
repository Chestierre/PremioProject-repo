@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <h2><b>Manage Collectors Orders</b></h2>
                        <div class="">
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
               {{-- {{dd($user->username);}}  --}}
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Orders: Customer</th>
                        <th>Balace</th>
                        <th>Monthly Amount</th>
                        <th>Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->order as $order)
                    <tr>
                        <td>
                            {{$order->customer->FirstName}} {{$order->customer->LastName}}
                        </td>
                        <td>
                            &#8369 {{number_format($order->balance)}}
                        </td>
                        <td>
                            &#8369 {{number_format($order->monthly_amount)}}
                        </td>
                        <td>
                            <form method="GET" action="{{ route('admin.collector.orderEdit', $order) }}">
                                <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Edit</button>
                            </form>
                            <form method="POST" action="{{ route('admin.collector.unassignOrder', [$user,  $order]  ) }}">
                                 @csrf
                                {{-- <input type="hidden" name="order_id" value={{$order}}> --}}
                                <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-eye"></i> Unassign</button>
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
