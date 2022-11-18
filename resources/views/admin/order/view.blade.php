@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex mb-2 col">
            <h2 class="col-6"><b>Manage Order</b></h2>
            <div class="col-1 px-1">
                <form method="GET"action="{{ url()->previous()}}">
                    <button type="submit" class="btn btn-success w-100"><i class="fa-solid primary"></i>Go Back</button>    
                </form>
            </div>
            <a href="#" class="btn btn-secondary col-3 " data-toggle="modal" data-target="#paymentModal"> <span><i class="fa-solid fa-face-grin-hearts"></i> Payment Test</span></a>
            <div class="col-2 px-1">
                <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#printpdfModal"> <span><i class="fa-solid fa-face-grin-hearts"></i>Print pdf form</span></a>
                {{-- <form method="GET"action="{{ route('admin.order.pdfOrderHistory', $order) }}">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid primary"></i>Print pdf form</button>    
                </form> --}}
                
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
        </tbody>
    </table>
</div>

{{-- payment modal --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Payment Amount</h5>
          <button type="button" class="close createmodal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.order.pay', $order) }}">
                @csrf     
                <label for="" class="control-label"> Payment</label>
                <input type="number @error('payment') is-invalid @enderror" name="payment" class="form-control" required>
                
                @error('payment')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary createmodal-dismiss" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>

{{-- printpdf modal --}}
<div class="modal fade" id="printpdfModal" tabindex="-1" role="dialog" aria-labelledby="printpdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="printpdfModalLabel">Print PDF options</h5>
          <button type="button" class="close createmodal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
                <form method="GET"action="{{ route('admin.order.pdfOrderHistory', $order) }}">
                    <div class="row mb-3">
                        <label for="customerLabel" class="col-md-10 col-form-label">{{ __('Print whole history:') }}</label>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid primary"></i>Print pdf</button>  
                        </div>
                    </div>
                </form>
                <form method="POST"action="{{ route('admin.order.pdfOrderHistoryByDate', $order) }}">
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" name="methodtype" value="ByDate">
                        <label for="customerLabel" class="col-md-3 col-form-label">{{ __('Print by date:') }}</label>
                        <input type="date" name="datebefore" class="col-md-3" required>
                        <label for="customerLabel" class="col-md-1 col-form-label">{{ __('to:') }}</label>
                        <input type="date" name="dateafter" class="col-md-3" required>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid primary"></i>Print pdf</button>  
                        </div>
                    </div>
                </form>

                <form method="POST"action="{{ route('admin.order.pdfOrderHistoryByDate', $order) }}">
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" name="methodtype" value="ByMonth">
                        <label for="customerLabel" class="col-md-3 col-form-label">{{ __('After date until present:') }}</label>
                        <input type="month" name="dateafter" class="col-md-3" required>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid primary"></i>Print pdf</button>  
                        </div>
                    </div>
                </form>
        </div>

      </div>
    </div>
</div>

@endsection
