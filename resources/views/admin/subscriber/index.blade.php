@extends('layouts.adminlayout')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="d-flex">
                            <h2><b>Manage Subscriber</b></h2>
                            <a href="{{url()->previous();}}" class="btn btn-success mx-2" style="height: 1cm"> Go Back</a>
                        </div>
                        
                    </div>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Customer
                            </th>
                            <th>
                                Enable/Disable
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->FirstName}} {{$customer->LastName}}</td>
                                <td>
                                    @if ($customer->IsSubscriber == '1')
                                        <button class="btn btn-danger btn_click" id="btn{{$customer->id}}" data-id="{{$customer->id}}" value="Disable">Disable</button>
                                    @else
                                         <button class="btn btn-primary btn_click" id="btn{{$customer->id}}" data-id="{{$customer->id}}" value="Enable">Enable</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn_click',  function(){
            var state = $(this).val();
            var item = $(this).attr('data-id');

            if (state == "Enable"){
                $( '#btn'+item ).replaceWith( '<button class="btn btn-danger btn_click" id="btn'+item+'" data-id="'+item+'" value="Disable">Disable</button>' );
            }else if (state == 'Disable'){
                
                $( '#btn'+item ).replaceWith( '<button class="btn btn-primary btn_click" id="btn'+item+'" data-id="'+item+'" value="Enable">Enable</button>' );
            }

            $.ajax({
                    url: '/admin/subscribe',
                    type: "PATCH",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        item: item,
                        state: state,
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                            
                            alert(data.responseText);
                            
                    }     
            });
        });
    });
</script>
    
@endsection