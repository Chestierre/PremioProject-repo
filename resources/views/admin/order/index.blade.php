@extends('layouts.adminlayout')
@section('content')

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2 class="col-6"><b>Manage Order</b></h2>
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createOrderModal"> <span>Add New Order</span></a>
                            <button type="button" class="mx-1 btn btn-secondary" data-toggle="modal" data-target="#orderReportModal"><i class="fa-regular fa-lightbulb"></i></button>
                            <button type="button" class="btn btn-danger"  id="getModalbtn"><i class="fa-solid fa-hand"></i></button>
                            <a href="#" class="btn btn-primary mx-1" data-toggle="modal" data-target="#printpdfModal"> <span><i class="fa-solid fa-face-grin-hearts"></i> Print pdf form</span></a>
                        </div>
                        <div class="">
                            <form method="GET" action={{route("admin.order.search")}}>
                                @csrf 
                                <div class="d-flex">
                                
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                                    <select name="categories" class="btn btn-secondary dropdown-toggle" type="button">
                                        {{-- <option>All</option> --}}
                                        <option>Customer</option>
                                        <option>Unit</option>
                                        <option>Ongoing</option>
                                        <option>Delinquent</option>
                                    </select>
                                   <button type="submit" class="btn btn-outline-primary my-sm-0">search</button>
                                </div>
                            </form>
                        </div>
                    </div>   
                    
                </div>
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                        <th>Customer</th>
                        <th>Unit</th>
                        <th>Balance</th>
                        <th>Transaction Date</th>
                        <th>Order Status</th>
                        <th>Customer Status</th>
                        <th>Due date</th>
                        {{-- <th>Customer Status</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $orders)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" data-id={{$orders->id  }}>
                            </td>
                            <td>{{$orders->ordercustomerinformation->FirstName}} {{$orders->ordercustomerinformation->LastName}}</td>
                            <td>{{$orders->ordertransactiondetails->unitmodelname}}</td>
                            <td>&#8369 {{number_format($orders->balance)}}</td>
                            <td>{{ \Carbon\Carbon::parse($orders->created_at)->format('F d, Y') }}</td>
                            
                            @if ($orders->orderstatus == 0)
                                <td>Ongoing Installment</td>
                            @else
                                <td>Paid</td>    
                            @endif

                            <td>{{$orders->customerstatus}}</td>
                            <td>{{ \Carbon\Carbon::parse($orders->due_date)->format('F d, Y')}}</td>
                            <td>
                                <div class="d-flex">
                                    <form method="GET" action="{{ route('admin.order.show', $orders) }}">
                                        <button type="submit" class="btn btn-warning" ><i class="fa-solid fa-eye"></i> View</button>
                                    </form>
                                    {{-- <form method="GET" action="{{ route('admin.order.edit', $orders) }}">
                                        <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-pen"></i> Edit</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $orders->id }}, `{{ $orders->ordertransactiondetails->unitmodelname }}`)">
                                        <i class="fa-solid fa-trash-can"></i> Delete</button>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- delete all checkbox --}}
    <div class="d-flex justify-content-end">  
        <button  style="display:none;" class="btn btn-danger delete_all p-2" data-url="{{ url('admin/userDeleteAll') }}">Delete All Selected</button>
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
            
                <select name="options" id="printpdfselect" class="form-select mb-3">
                    <option value="1">Whole History</option>
                    <option value="2">In Between Months</option>
                    <option value="3">By Month</option>
                </select>

                <form method="GET"action="{{ route('admin.order.pdfOrders') }}" style="display:none" id="whole">
                    <div class="row mb-3">
                        <label for="customerLabel" class="col-md-10 col-form-label">{{ __('Print whole history:') }}</label>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid primary"></i>Print pdf</button>  
                        </div>
                    </div>
                </form>

                <form method="POST"action="{{ route('admin.order.pdfOrderByDate') }}" style="display:none" id="inbetween">
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
 
                <form method="POST"action="{{ route('admin.order.pdfOrderByDate') }}" style="display:none" id="months">
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

{{-- blank status modal --}}
<div class="modal fade" id="blankStatusModal" tabindex="-1" role="dialog" aria-labelledby="blankStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="blankStatusModalLabel"><span id="blanktitle"></span></h5>
        <button type="button" class="close blankModalDismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <P>Total number of <span id="orderdelinquent"></span> from <span id="timebefore"> </span> to <span id="timeafter"></span> are <span id="result"></span>.</P>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary blankModalDismiss" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

{{-- getter modals --}}
<div class="modal fade" id="getterModal" tabindex="-1" role="dialog" aria-labelledby="getterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="getterModalLabel">Fetching Reporting</h5>
        <button type="button" class="close getterModalDismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <p class="h6">Get number of Delinquent:</p>
                <label for="" class="col-form-label">{{ __('Print by date:') }}</label>
                <input type="date" id="timebeforedeliquent" class="form-control" >
                <label for="" class="col-form-label">{{ __('to:') }}</label>
                <input type="date" id="timeafterdeliquent" class="form-control">
                <a href="#" class="btn btn-primary getterbutton" id="delinquentbtn" data-id="deliquent">Get</a>
            </div>

            <div class="row mt-4">
                <p class="h6">Get number of Orders:</p>
                <label for="" class="col-form-label">{{ __('Print by date:') }}</label>
                <input type="date" id="datebeforeorder" class="form-control">
                <label for="" class="col-form-label">{{ __('to:') }}</label>
                <input type="date" id="dateafterorder" class="form-control">
                <a href="#" class="btn btn-primary getterbutton" id="ordersbtn" data-id="order">Get</a>
            </div>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary getterModalDismiss" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

{{-- Order Reporting Modal --}}
<div class="modal fade" id="orderReportModal" tabindex="-1" role="dialog" aria-labelledby="orderReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="orderReportModalLabel">Reporting for Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p class="">Total number of Orders: {{$order->count()}}</p>
            <p class="">Total number of Orders late in payment: {{$order->where('customerstatus', 'Delinquent')->count()}}</p>
            <p class="">Total number of Orders on time in payment: {{$order->where('customerstatus', 'Regular')->count()}}</p>
            <p class="">Total number of Completed Orders: {{$order->where('orderstatus', '1')->count()}}</p>
            <p class="">Total number of Ongoing Orders: {{$order->where('orderstatus', '0')->count()}}</p>
            <p class="">Total Number of Orders made in last 30 days from now: {{$order->where('created_at', '>', now()->subDays(30))->count()}}</p>    
            {{-- <div class="row">
                <p class="h6">Get number of Delinquent:</p>
                <label for="customerLabel" class="col-form-label">{{ __('Print by date:') }}</label>
                <input type="date" name="datebefore" class="form-control">
                <label for="customerLabel" class="col-form-label">{{ __('to:') }}</label>
                <input type="date" name="dateafter" class="form-control">
                <a href="" class="btn btn-primary">Get</a>
            </div> --}}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

{{-- modal delete on-click --}}
<div class="modal fade" id="deleteCategory"  tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">This action is not reversible.</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span id="modal-category_name"></span>?
                <input type="hidden" id="category" name="category_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-white" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
            </div>
        </div>
    </div>
</div>


{{-- create order modal --}}
<div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrderModalLabel">Create Order</h5>
                <button type="button" class="close createmodal-dismiss" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <form method="POST" action="{{ route('admin.order.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="customerLabel" class="col-md-4 col-form-label text-md-end">{{ __('Customer') }}</label>
                                <div class="col-md-6">
                                    <select name="customer_id" class="btn btn-secondary dropdown-toggle" type="button">
                                        @foreach ($customer as $customers)
                                            <option value= {{$customers->id}} >{{$customers->FirstName}} {{$customers->LastName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="unitLabel" class="col-md-4 col-form-label text-md-end">{{ __('Unit') }}</label>
                                <div class="col-md-6">
                                    <select id="modal_unit_select" name="unit_id" class="btn btn-secondary dropdown-toggle" type="button">
                                        @foreach ($unit as $units)
                                            <option value= {{$units->id}} >{{$units->modelname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="downpayment" class="col-md-4 col-form-label text-md-end">{{ __('Enter Downpayment') }}</label>
                                <div class="col-md-6">
                                <input id="downpayment" type="number" class="form-control @error('downpayment') is-invalid @enderror" name="downpayment" value="{{ old('downpayment') }}" required>
                                    @error('downpayment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <div id="downpayment_divtext" style="display:none;"> --}}
                                    <input id="downpayment_text" style="display:none;" class="form-control" type="text">
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="monthsinstallmentLabel" class="col-md-4 col-form-label text-md-end">{{ __('Months Installment') }}</label>
                                <div class="col-md-6">
                                    <select name="monthsinstallment" id="monthsinstallment" class="btn btn-secondary dropdown-toggle" type="button">
                                        <option value="6">Six Months</option>
                                        <option value="12">Twelve Months</option>
                                        <option value="18">Eighteen Months</option>
                                        <option value="24">Twenty-four Months</option>
                                        <option value="30">Thirty Months</option>
                                        <option value="36">Thirty-six Months</option>                    
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="monthly" id="monthly" value="">
                            <input type="hidden" name="balance" id="balance" value="">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary createmodal-dismiss" data-dismiss="modal">Close</button>
                                <button type="submit" id="createOrderButton" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        Unit Price: &#8369
                        <span id="modal-price"></span>
                        <input type="hidden" id="input_modal-price" value="">
                        <input type="hidden" id="input_brandratesix" value="">
                        <input type="hidden" id="input_brandratetwelve" value="">
                        <input type="hidden" id="input_brandrateeighteen" value="">
                        <input type="hidden" id="input_brandratetwentyfour" value="">
                        <input type="hidden" id="input_brandratethirty" value="">
                        <input type="hidden" id="input_brandratethirtysix" value="">
                        <br>
                        Unit Minumum Downpayment: &#8369
                        <span id="modal-downpayment"></span>
                        {{-- <input type="hidden" id="input_modal-downpayment" value=""> --}}
                        <br>
                        Installment months selected:
                        <span id="modal-months"></span> months
                        <br>
                        Per Monthly: &#8369
                        <span id="modal-perMonthly"></span>
                        <br>
                        Total Balance: &#8369
                        <span id="modal-balance"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
 {{-- Scripts - checkbox --}}
 <script type="text/javascript">


    $(document).ready(function () {
        $.fn.digits = function(){ 
            return this.each(function(){ 
                $(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );  
            })
        }

        @if ($errors->has('downpayment'))
            $('#createOrderModal').modal('show');
        @endif

        var mode = $('#printpdfselect').val();

            if (mode == 1){
                $('#whole').show();
                $('#inbetween').hide();
                $('#months').hide();
            }else if (mode == 2){
                $('#whole').hide();
                $('#inbetween').show();
                $('#months').hide();
            }else if (mode == 3){
                $('#whole').hide();
                $('#inbetween').hide();
                $('#months').show();
            }

        $('#printpdfselect').on('change', function(){
            var mode = $('#printpdfselect').val();

            if (mode == 1){
                $('#whole').show();
                $('#inbetween').hide();
                $('#months').hide();
            }else if (mode == 2){
                $('#whole').hide();
                $('#inbetween').show();
                $('#months').hide();
            }else if (mode == 3){
                $('#whole').hide();
                $('#inbetween').hide();
                $('#months').show();
            }
        });

        $('.blankModalDismiss').on('click', function(){
            $('#blankStatusModal').modal('hide');
        });

        $('.createmodal-dismiss').on('click', function(){
            $('#createOrderModal').modal('hide'); 
        });

        $('#getModalbtn').on('click', function(){
            $('#getterModal').modal('show');
        });

        $('.getterModalDismiss').on('click', function(){
            $('#getterModal').modal('hide');
        })

        $('.getterbutton').on('click', function(){
            var mode = $(this).attr('data-id');
            console.log(mode);
            if (mode == "deliquent"){                
                var timebefore = $('#timebeforedeliquent').val();
                var timeafter = $('#timeafterdeliquent').val();
            }else{
                var timebefore = $('#datebeforeorder').val();
                var timeafter = $('#dateafterorder').val();
            }

            // console.log(timeafter);
            if (timebefore != ""|| timeafter != ""){
                $('#getterModal').modal('hide');
                $('#blankStatusModal').modal('show');
                if (mode == "deliquent"){
                    $('#blanktitle').html('Get Delinquent');
                    $('#orderdelinquent').html('Delinquents');
                    var urls = 'order/getordersdelinquent';
                }else{
                    $('#blanktitle').html('Get Orders Count');
                    $('#orderdelinquent').html('Orders');
                    var urls = 'order/getorders';

                }

                $('#timebefore').html(timebefore);
                $('#timeafter').html(timeafter);

                // $.get('order/getorders', function(data){
                //     console.log(data);
                // });

                $.ajax({
                    url: urls,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        timebefore: timebefore,
                        timeafter: timeafter,
                    },
                    success: function (data) {
                        // console.log(data);
                        $('span#result').html(data);
                    },
                    error: function (error) {
                    }
                });
            }else{
                alert("Input Date");
            }
        });

        // $('#ordersbtn').on('click', function(){

        //     // console.log(timeafter);
        //     if (timebefore != ""|| timeafter != ""){
        //         $('#getterModal').modal('hide');
        //         $('#blankStatusModal').modal('show');

        //         $('#timebefore').html(timebefore);
        //         $('#timeafter').html(timeafter);

        //         // $.get('order/getorders', function(data){
        //         //     console.log(data);
        //         // });

        //         $.ajax({
        //             url: 'order/getordersdelinquent',
        //             type: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 timebefore: timebefore,
        //                 timeafter: timeafter,
        //             },
        //             success: function (data) {
        //                 // console.log(data);
        //                 $('span#result').html(data);
        //             },
        //             error: function (error) {
        //             }
        //         });
        //     }else{
        //         alert("Input Date");
        //     }
        // });

        $('#blankStatusModal').on('hidden.bs.modal', function (e) {
            $('#getterModal').modal('show');
        })

        // console.log($('#input_modal-price').val());
        // initial: price and downpayment
        id = $('#modal_unit_select').val();
        queryPrice(id);
        $('#modal_unit_select').on('click', function(e) {
            id = $('#modal_unit_select').val();
            queryPrice(id);
        });


        $('select#monthsinstallment').on('click', function(e) {
            months = $('select#monthsinstallment').val();
            $('#modal-months').html(months);
            payment = $('input#downpayment').val();
            calculatePrice(payment, months);
        });



        $('input#downpayment').on('keyup change', function(e){
            months = $('select#monthsinstallment').val();
            payment = $('input#downpayment').val();
            // $('input#downpayment').val(addCommas(payment));
            calculatePrice(payment, months);
        });

        $('input#downpayment').on('change blur', function(e){
            // $("input#downpayment").digits();
            // $('#downpayment_text').attr('type', "text");
            $("input#downpayment").hide();
            $('#downpayment_text').show();
             $('#downpayment_text').val($('input#downpayment').val());
            // $('#downpayment_text').val('&euro');
            $('#downpayment_text').digits();
        });

        $('#downpayment_text').on('focus', function(e){
            $('#downpayment_text').hide();
            $("input#downpayment").show();
            $("input#downpayment").focus();
        });

        
        $('#createOrderButton').on('click', function(e) {
            $('#downpayment_text').hide();
            $("input#downpayment").show();
            $("input#downpayment").focus();
        });

        // select all checkbox
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);
            $(".delete_all").show(); 
         } else {  
            $(".sub_chk").prop('checked',false);
            $(".delete_all").hide();  
         }  
        });

        // master and subchk is the checkbox
        $('.sub_chk').on('click', function(e) {
            if($(this).is(':checked', true))  
            {
                $(".delete_all").show(); 
            } else {  
                $(".delete_all").hide();
            }  
        });

        // delete all function
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  

            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  
            else 
            {  
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  
                    var join_selected_values = allVals.join(","); 

                    $.ajax(
                    {
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) 
                            {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } 
                            else if (data['error']) 
                            {
                                alert(data['error']);
                            } 
                            else 
                            {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });

        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            return false;
        });
    });


    function loadDeleteModal(id, name) {
        $('#modal-category_name').html(name);
        $('#deleteCategory').modal('show');
        $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
    }

    function confirmDelete(id) {
        $.ajax({
            url: 'order/' + id,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                '_method': 'delete',
            },
            success: function (data) {
                $('#deleteCategory').modal('hide');
                location.reload();
            },
            error: function (error) {
            }
        });
    }

    function queryPrice(id) {
        $.ajax({
            url: 'queryPrice/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                $('#modal-price').html(response.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                $('#input_modal-price').val(response.price);
                $('#input_brandratesix').val(response.brand.sixMonthRate);
                $('#input_brandratetwelve').val(response.brand.twelveMonthRate);
                $('#input_brandrateeighteen').val(response.brand.eigthteenMonthRate);
                $('#input_brandratetwentyfour').val(response.brand.twentyfourMonthRate);
                $('#input_brandratethirty').val(response.brand.thirtyMonthRate);
                $('#input_brandratethirtysix').val(response.brand.thirtysixMonthRate);
                // $('#input_modal-downpayment').val(response.modeldownpayment);
                $('#modal-downpayment').html(response.modeldownpayment.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                $('input#downpayment').attr({"min" : response.modeldownpayment});
                $('input#downpayment').attr({"max" : response.price});
                $('#modal-months').html($('select#monthsinstallment').val());
                months = $('select#monthsinstallment').val();
                payment = $('input#downpayment').val();
                calculatePrice(payment, months);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function calculatePrice(payment, months){
         if (payment != ""){
            months = Number(months);
            payment = Number(payment);
            unitprice = Number($('#input_modal-price').val());
            switch(months){
                case 12:
                    rate = Number($('#input_brandratetwelve').val());
                    break;
                case 18:
                    rate = Number($('#input_brandrateeighteen').val());
                    break;
                case 24:
                    rate = Number($('#input_brandratetwentyfour').val());
                    break;
                case 30:
                    rate = Number($('#input_brandratethirty').val());
                    break;
                case 36:
                    rate = Number($('#input_brandratethirtysix').val());
                    break;
                default:
                    rate = Number($('#input_brandratesix').val());
            }
            balance = Math.ceil(((unitprice - payment) * rate));
            //console.log(balance);
            totalPerMontly = (((unitprice - payment)* rate) / months)+200; 
            totalPerMontlyciel = Math.ceil(totalPerMontly);
            totalPerMonthlyMod = totalPerMontlyciel % 10;
            if (totalPerMonthlyMod > 5){
                // console.log('more than 5:' + (totalPerMontlyciel +(10 - totalPerMonthlyMod)));
                overalltotal = (totalPerMontlyciel +(10 - totalPerMonthlyMod));
            }
            else if(totalPerMonthlyMod <= 5 && totalPerMonthlyMod > 0){
                // console.log('less than 5:' + (totalPerMontlyciel +(5 - totalPerMonthlyMod)));
                overalltotal = (totalPerMontlyciel +(5 - totalPerMonthlyMod));
            }
            else{
                // console.log('equals to zero:' + totalPerMontlyciel);
                overalltotal = totalPerMontlyciel;
            }
            // console.log(overalltotal);
            $('#modal-perMonthly').html(overalltotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $('#modal-balance').html(balance.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $('input#monthly').val(overalltotal);
            $('input#balance').val(balance);
           
         }else{
            // console.log('fail calculate price');
         }
        
        

     }    
</script>
@endsection
