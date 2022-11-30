@extends('layouts.adminlayout')

@section('content')

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <h2><b>Manage Collector</b></h2>
                        <div class="">
                            {{-- <form method="POST" action={{route("admin.user.search")}}>
                                @csrf 
                                <div class="d-flex">
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                               
                                   <button type="submit" class="btn btn-outline-primary my-sm-0">search</button>
                            </div>
                            </form> --}}
                        </div> 
                    </div>
                </div>

            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Collector</th>
                        <th>Collector Count</th>
                        <th>Assign/View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectors as $collector)
                        <tr>
                            <td>{{$collector->user->username}}</td>
                            <td id="td2{{$collector->id}}">{{$collector->customer->count()}}</td>
                            <td><a href="#" class="btn btn-primary col-sm editButton" data-id={{$collector->id}}> <span><i class="fa-solid fa-pen"></i> Assign</span></a>
                                @if ($collector->customer->count() != 0)
                                    <a href="#" id="atd3{{$collector->id}}" class="btn btn-warning col-sm viewButton" data-id={{$collector->id}}> <span><i class="fa-solid fa-eye"></i> View</span></a>    
                                @else
                                    <a id="atd3{{$collector->id}}"></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- assign customer modal --}}
<div class="modal fade" id="assignCustomerModal" tabindex="-1" role="dialog" aria-labelledby="assignCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignCustomerModalLabel">Assign Customer for <span id="assignCollectorName"></span></h5>
          <button type="button" class="close assignCustomerModal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Assign</th>
                        <th>Collector Assigned</th>
                    </tr>
                </thead>
                <tbody id="assignCustomerModalTbody">

                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>

{{-- view customer modal --}}
<div class="modal fade" id="viewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="viewCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewCustomerModalLabel">Customers assigned to collector</h5>
          <button type="button" class="close viewCustomerModal-dismiss" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="viewCustomerModalTbody">

                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', 'a.viewButton',function(){
                // console.log("view button pressed");
                var collector_id = $(this).attr('data-id');
                $.get('collector/getallcustomerfromcollector/'+ $(this).attr('data-id'), function(data){
                    $.each(data, function(key, item){
                        // console.log(item.user.id);
                        var firstline = '<td class="viewCustomerTable">' + item.FirstName+ ' ' + item.LastName +'</td>';
                        // console.log(item.order.length);
                        
                        if(item.order.length != 0){
                            // console.log(';huh');
                            var secondline = '<td class="viewCustomerTable">\
                            <form method="GET" action="/admin/admincustomer/customerOrder/'+item.user.id+'" class ="mx-2">\
                                <button type="submit" class="btn btn-secondary" style="width:6em"><i class="fa-solid fa-file-pen"></i>Orders</button></form></td>';
                        }else{
                           var secondline = '<td></td>' 
                        }
                            
                         //{{ route('admin.admincustomer.customerOrder', 'item.user.id') }}    
                         



                        var final = ('<tr class="viewCustomerTable">'+firstline+secondline+'</tr>');
                        $('tbody#viewCustomerModalTbody').append(final);
                    });
                });
                $('#viewCustomerModal').modal('show');
            });

            $('.viewCustomerModal-dismiss').on('click', function(){
                $('#viewCustomerModal').modal('hide'); 
            });

            $('#viewCustomerModal').on('hidden.bs.modal', function (e) {
                $('.viewCustomerTable').remove();
            })

            

            $('.editButton').on('click', function(){
                var collector_id = $(this).attr('data-id');
                $.get('collector/getcustomercollectorrelation/'+ $(this).attr('data-id'), function(data){
                     $.each(data[0], function(key, item){
                        var firstelement = '<td class="assignCustomerTable">' + item.FirstName+ ' ' + item.LastName +'</td>';        
                        var thirdelement = '<td class="assignCustomerTable" id="collectorAssign'+item.id+'"></td>';
                        var username = "";
                        $.each(data[1], function(i,v){
                            if (v.id == item.collector_id){
                                thirdelement = '<td class="assignCustomerTable" id="collectorAssign'+item.id+'">'+v.user.username+'</td>';   
                            }
                            if (v.id == collector_id){
                                username = v.user.username;
                                $('#assignCollectorName').html(username);   
                            }
                        });

                        if(collector_id != item.collector_id){
                            console.log("das");
                            var secondelement ='<td class="assignCustomerTable"><button type="button" class="btn btn-primary" onclick="loadassignbutton('+item.id+', 0, '+collector_id+', \''+username+'\')" id="assignBtn'+item.id+'"">Assign</button></td>';
                        }else{
                            var secondelement = '<td class="assignCustomerTable"><button type="button" class="btn btn-danger" onclick="loadassignbutton('+item.id+', 1, '+collector_id+', \''+username+'\')" id="assignBtn'+item.id+'"">Remove</button>';
                        }
                        var final = ('<tr class="assignCustomerTable">'+firstelement+secondelement+thirdelement+'</tr>')
                        $('tbody#assignCustomerModalTbody').append(final);      
                    });

                }); 
                $('#assignCustomerModal').modal('show');
            });

            $('.assignCustomerModal-dismiss').on('click', function(){
                $('#assignCustomerModal').modal('hide'); 
            });
            
            $('#assignCustomerModal').on('hidden.bs.modal', function (e) {
                $('.assignCustomerTable').remove();
                $.ajax({
                    url: 'collector/ajaxindex/',
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function(key, item){
                            // console.log(item);
                             $('#td2'+item.id).replaceWith('<td id="td2'+item.id+'">'+item.customer.length+'</td>');

                             if(item.customer.length != 0){
                                $('#atd3'+item.id).replaceWith('<a href="#" id="atd3'+item.id+'" class="btn btn-warning col-sm viewButton" data-id='+item.id+'> <span><i class="fa-solid fa-eye"></i> View</span></a>');
                             }else{
                                $('#atd3'+item.id).replaceWith('<a id="atd3'+item.id+'"></a>');
                             }
                            
                        });
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }     
                });
            });
        });

        function loadassignbutton(customer_id, state, collector_id, username){
            // console.log(state);
            console.log(username);
            if(state == 0){
                
                $( '#assignBtn'+customer_id ).replaceWith( '<button type="button" class="btn btn-danger" onclick="loadassignbutton('+customer_id+', 1, '+collector_id+', \''+username+'\')" id="assignBtn'+customer_id+'"">Remove</button>' );
                $('#collectorAssign'+customer_id).replaceWith('<td class="assignCustomerTable" id="collectorAssign'+customer_id+'">'+username+'</td>');
            }else{
                $( '#assignBtn'+customer_id ).replaceWith( '<button type="button" class="btn btn-primary" onclick="loadassignbutton('+customer_id+', 0, '+collector_id+', \''+username+'\')" id="assignBtn'+customer_id+'"">Assign</button>' );
                $('#collectorAssign'+customer_id).replaceWith('<td class="assignCustomerTable" id="collectorAssign'+customer_id+'"></td>');
            }
            
            $.ajax({
                    url: 'collector/assigncustomer/' + collector_id,
                    type: "PATCH",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        customer_id: customer_id,
                        state: state,
                    },
                    dataType: 'json',
                    success: function (data) {
                        // console.log(data);
                    },
                    error: function (data) {
                            
                            alert(data.responseText);
                            
                    }     
            });
        }
        
    </script>

@endsection