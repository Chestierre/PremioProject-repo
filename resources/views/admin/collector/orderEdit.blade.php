@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    
                    {{ __('Order Edit') }}


                    <form method="POST" action="{{ route('admin.order.update', $order)}}">
                        @method('PUT')
                        @csrf
                        Balance: &#8369 {{number_format($order->balance)}}
                        <br>
                        <br>
                        Deduct Balance:
                        <input type="text" class="form-control" name="deductbalance" value ="{{ old('deductbalance') }}" />

                        <br>
                        Did the customer pay this month?:
                        <select name="isMonthPay" class="btn btn-secondary dropdown-toggle" type="button">
                                <option value= '1'>Yes</option>
                                <option value= '0' selected>No</option>
                       </select>

                        <br />
                        <br>
                        <br>
                        
                        {{-- Payed this month:
                        <a href="{{ route('admin.order.deductmonthly', $order)}}" class="btn btn-primary" type="button">Click to deduct</a>
                        <br>
                        <br> --}}
                        
                        <br />
                        <button type="submit" class="btn btn-primary"> Save </button>
                        <a href = {{ route('admin.order.index') }} type="button" class="btn btn-success"> Go Back </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
