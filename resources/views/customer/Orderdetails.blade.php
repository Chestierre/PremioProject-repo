@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">Orders: {{$customer->FirstName}} {{$customer->LastName}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="h2">Orders</div>
                                </div>
                            </div>
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Unit</th>
                                        <th>Order Date</th>
                                        <th>Order Price</th>
                                        <th>Order Monthly</th>
                                        <th>Payment Date</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Order History</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer->order as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->ordertransactiondetails->unitmodelname}}</td>
                                        <td>{{($order->ordertransactiondetails->created_at)->toFormattedDateString()}}</td>
                                        <td>&#8369 {{number_format($order->ordertransactiondetails->unitmodelprice)}}</td>
                                        <td>&#8369 {{number_format($order->ordertransactiondetails->monthlypayment)}}</td>
                                        <td>{{$order->ordertransactiondetails->paymentdate}}</td>
                                        <td>{{$order->customerstatus}}</td>
                                        <td>
                                            @if ($order->orderstatus == 0 )
                                            Ongoing Payment
                                            @elseif ($order->orderstatus == 1)
                                            Paid
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-secondary viewbtn" data-id={{$order->id}}>View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- view modal --}}
{{-- collector are you sure? modal edit --}}
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ViewModalLabel">Order History</h5>
          <button type="button" class="close ViewModal-dismiss dismiss_view" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-tilte">
                        <div class="row justify-content-center h4">
                            Orders
                        </div>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Payment</th>
                                <th>Paid Date</th>
                                <th>Current Month</th>
                                <th>Paid Month</th>
                            </tr>
                        </thead>
                        <tbody id="viewtablebody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary dismiss_view" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dismiss_view').on('click', function(){
                $('#ViewModal').modal('hide');
            });
            
            $('.viewbtn').on('click', function(){
                id = $(this).attr('data-id');
                $('#ViewModal').modal('show');

                $.get('getorderdata/'+id, function(data){
                    
                        $.each(data.orderhistory, function(key, item){
                            // console.log(item);
                            var td1 = '<td class=viewAppend>'+item.payment+'</td>'
                            var td2 = '<td class=viewAppend>'+item.date_updated+'</td>' 
                            var td3 = '<td class=viewAppend>'+item.currentmonth+'</td>' 
                            var td4 = '<td class=viewAppend>'+item.monthspaid+'</td>' 
                            var tr = ('<tr class="viewAppend">'+td1+td2+td3+td4+'</tr>')
                            $('tbody#viewtablebody').append(tr); 
                        });
                });
            });
            $('#ViewModal').on('hidden.bs.modal', function (e) {
                $('.viewAppend').remove();
            });   
        });


    </script>
@endsection