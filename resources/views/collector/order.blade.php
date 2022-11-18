@extends('layouts.collectorlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 mb-2 d-flex justify-content-between">
                        <h1 class="h2"><b>Customer: {{$customer->FirstName}} {{$customer->LastName}}</b></h1>
                        <a href = {{ route('collector.inspector.index') }} type="button" class="btn btn-success"> Go Back </a>
                    </div>
                </div>
                
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Status</th>
                        <th>Customer Status</th>
                        <th>Last Payment Date</th>
                        <th>Payment Due Date</th>
                        <th>Amount to be paid this month</th>
                        <th>Supposed monthly payment</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer->order as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>
                                @if($order->orderstatus == '0')
                                    Ongoing
                                @else
                                    Fully Paid
                                @endif
                            </td>
                            <td>{{$order->customerstatus}}</td>
                            <td>{{$order->updated_at}}</td>
                            <td>{{$order->due_date}}</td>
                            <td>&#8369 {{number_format($order->balancetobepaid)}}</td>
                            <td>&#8369 {{number_format($order->ordertransactiondetails->monthlypayment)}}</td>
                            <td>
                                <a href="#" type="button" class="btn btn-primary" id="paymentButton" data-id={{$order->id}}> <span><i class="fa-solid  fa-file-pen"></i> Pay</span></a>
                                <a href="{{ route ('collector.inspector.show', $order)}}"  type="button" class="btn btn-secondary"><i class="fa-solid fa-file-pen"></i> history</a>
                                <a href="#" type="button" class="btn btn-success" id="orderDetailsButton" data-id={{$order->id}}> <span><i class="fa-solid  fa-file-pen"></i>  order details</span></a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- payment modal --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Pay</h5>
          <button type="button" class="close paymentbtnclose" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <form method="POST" action="{{ route('collector.order.pay', $order) }}"> --}}
            <form method="POST" action="#" id="paymentFormModal">
                @csrf     
                <label for="" class="control-label"> Payment</label>
                <input type="number @error('payment') is-invalid @enderror" name="payment" class="form-control" required>
                
                @error('payment')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary paymentbtnclose" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Pay</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>

{{-- order details modal --}}
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderDetailsModalLabel">Order details</h5>
          <button type="button" class="close orderdetailsbtnclose" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <p class="col offset-1">
                    Unit bought:
                </p>
                <p class="col" id="unitBought"></p>
            </div>
            <div class="row">
                <p class="col offset-1">
                    Brand:
                </p>
                <p class="col" id="brand"></p>
            </div>
            <div class="row">
                <p class="col offset-1">
                    Bought Date:
                </p>
                <p class="col" id="paymentDate"></p>
            </div>
            <div class="row">
                <p class="col offset-1">
                    Orginal price:
                </p>
                <p class="col" id="originalPrice"></p>
            </div>
            <div class="row">
                <p class="col offset-1">
                    Initial downpayment:
                </p>
                <p class="col" id="downpayment"></p>
            </div>
            <div class="row">
                <p class="col offset-1">
                    Months plan:
                </p>
                <p class="col" id="monthsinstallment"></p>
            </div>

        </div>
      </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#paymentButton').on('click', function(){
            // console.log("pressed");
            var id = $(this).attr('data-id');
            $('#paymentModal').modal('show');
            $('#paymentFormModal').replaceWith('<form method="POST" action="/collector/'+id+'/pay" id="paymentFormModal">\
                @csrf     \
                <label for="" class="control-label"> Payment</label>\
                <input type="number" @error('payment') is-invalid @enderror" name="payment" class="form-control" required>\
                @error('payment')\
                    <span class="invalid-feedback text-danger" role="alert">\
                        <strong>{{ $message }}</strong>\
                    </span>\
                @enderror\
                <div class="modal-footer">\
                    <button type="button" class="btn btn-secondary paymentbtnclose" data-dismiss="modal">Close</button>\
                    <button type="submit" class="btn btn-primary"> Pay</button>\
                </div>\
            </form>');

        });

        $(document).on('click', '.paymentbtnclose', function(){
            $('#paymentModal').modal('hide');
        });

        $(document).on('click','.orderdetailsbtnclose', function(){
            $('#orderDetailsModal').modal('hide');
        });


        $('#orderDetailsButton').on('click', function(){
            var id = $(this).attr('data-id');
            $('#orderDetailsModal').modal('show');

            $.get('/collector/inspector/getorder/'+ id, function(data){
                $('#unitBought').html(data.ordertransactiondetails.unitmodelname);
                $('#brand').html(data.ordertransactiondetails.brandname);
                $('#paymentDate').html(data.ordertransactiondetails.paymentdate);
                var originalprice = "\u20B1" + number_format(data.ordertransactiondetails.unitmodelprice);
                $('#originalPrice').html(originalprice);
                var unitmodeldownpayment = "\u20B1" + number_format(data.ordertransactiondetails.unitmodeldownpayment);
                $('#downpayment').html(unitmodeldownpayment);
                $('#monthsinstallment').html(data.ordertransactiondetails.monthsinstallment);
            });

        })
    });
    function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

    

</script>
@endsection