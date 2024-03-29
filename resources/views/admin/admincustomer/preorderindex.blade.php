@extends('layouts.adminlayout')
@section('content')

@if (Session::get('bought'))
<div class="alert alert-success" role="alert">
    {{ Session::get('bought') }}
</div>
@endif

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2 class="col-6"><b>Manage Preorders</b></h2>
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <div class="d-flex">
                            <button type="button" class="mx-1 btn btn-secondary" data-toggle="modal" data-target="#preorderReportModal"><i class="fa-regular fa-lightbulb"></i></button>
                        </div>

                    </div>   
                    
                </div>
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                        <th>Customer/Applicant</th>
                        <th>User Type</th>
                        <th>Unit Name</th>
                        <th>Unit Image</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($preorders as $preorder)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" data-id={{$preorder->id}}>
                            </td>
                            <td>{{$preorder->customer->FirstName}} {{$preorder->customer->LastName}}</td>
                            {{-- <td>{{$preorder->unit_id}}</td> --}}
                            <td>{{$preorder->customer->user->userrole}}</td>
                            <td>{{$preorder->unit->modelname}}</td>
                            <td><img src= "/storage/{{ $preorder->unit->unitimage[0]->image }}" style="width:120px;"></td>
                            <td>{{$preorder->created_at}}</td>
                            <td><button class="btn btn-primary mx-1" onclick="loadCreateModal({{$preorder->unit_id}}, `{{$preorder->customer->FirstName}} {{$preorder->customer->LastName}}`, `{{$preorder->unit->modelname}}`, {{$preorder->customer_id}}, {{ $preorder->id }}, `{{$preorder->customer->user->userrole}}`)"><i class="fa-solid fa-cart-shopping"></i> Buy Unit</button>
                                <a type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $preorder->id }}, `{{ $preorder->unit->modelname }}`)"><i class="fa-solid fa-trash-can"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button style="display:none;" class="btn btn-danger delete_all" data-url="{{ url('admin/preorderDeleteAll') }}">Delete All Selected</button>
    </div>
 
</div>

{{-- Order Reporting Modal --}}
<div class="modal fade" id="preorderReportModal" tabindex="-1" role="dialog" aria-labelledby="preorderReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="preorderReportModalLabel">Reporting for Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p class="">Total number of Preorders: {{$preorders->count()}}</p>
            <p class="">Total Number of Preorders made in last 30 days from now: {{$preorders->where('created_at', '>', now()->subDays(30))->count()}}</p>    
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
                <div id="deletecustomerrelation"></div>
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
 

                                    <input type="text" value="" id="customer_nameinput" disabled >
                                    <input type="hidden" value="" name="customer_id" id="customer_idhidden" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="unitLabel" class="col-md-4 col-form-label text-md-end">{{ __('Unit') }}</label>
                                <div class="col-md-6">

                                    <input type="text" id="unit_nameinput" value="" disabled>
                                    <input type="hidden" id="modal_unit_select" name="unit_id">
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
                            <input type="hidden" name="flag" value="1">
                            <input type="hidden" name="applicantcheck" id="applicantcheck" value="0">
                            <input type="hidden" name="preorder_id" id="preorder_hidden" value="">
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

    <script type="text/javascript">

        $(document).ready(function(){
            $.fn.digits = function(){ 
                return this.each(function(){ 
                    $(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );  
                })
            }

            $('#createOrderModal').on('hidden.bs.modal', function (e) {
            
                $('#customer_idhidden').val("");
                $('#modal_unit_select').val("");
                $('#downpayment').val("");
                // $('#monthsinstallment').val("");
                $('#downpayment_text').val("");
                $('#modal-price').html("");
                $('odal-downpayment').html("");
                $('#modal-perMonthly').html("");
                $('#modal-balance').html("");
                // $('#modal-price').html("");

            });
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

            $('.sub_chk').on('click', function(e) {
                if($(this).is(':checked', true))  
            {
                $(".delete_all").show(); 
            } else {   
                $(".delete_all").hide();
            }  
            });
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

            $('.createmodal-dismiss').on('click', function(){
                $('#createOrderModal').modal('hide');
            });
        });
        function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            $('#deleteCategory').modal('show');
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        }

        function confirmDelete(id) {
            $.ajax({
                url: '/PreorderDelete/' + id,
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

        function loadCreateModal(unit_id, customer_name, unit_name, customer_id, preorder_id, userrole){
            if (userrole == "Applicant"){
                $('#applicantcheck').val("1");
            }else{
                $('#applicantcheck').val("0");
            }
            // console.log(customer_name);
            $('#preorder_hidden').val(preorder_id);
            $('#customer_nameinput').val(customer_name);
            $('#customer_idhidden').val(customer_id);
            $('#unit_nameinput').val(unit_name);
            $('#modal_unit_select').val(unit_id);
            id = $('#modal_unit_select').val();
            queryPrice(id);
            $('#createOrderModal').modal('show');
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
