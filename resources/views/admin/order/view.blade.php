@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
            <h2 class="col-6"><b>Manage Order</b></h2>
            {{-- <a href="{{ route(admin.order.pdfOrderHistory) }}" class="btn btn-primary"> <span>Print pdf form</span></a> --}}
            <form method="GET" action="{{ route('admin.order.pdfOrderHistory', $order) }}">
                <button type="submit" class="btn btn-primary" ><i class="fa-solid primary"></i>Print pdf form</button>
            </form>
        </div>
        
        
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Data Updated</th>
                <th>Balance</th>
                <th>Payment</th>
                <th>Months Lapsed</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ( as ) --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>

@endsection
