@extends('layouts.adminlayout')

@section('content')
@if (Session::get('status') == "200")
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@elseif(Session::get('status') == "400")
<div class="alert alert-danger" role="alert">
    {{ Session::get('message') }}
</div>
@endif


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <h2><b>SMS Logs</b></h2>
                </div>
                <div class="row">
                    <div class="col-xs-6 d-flex justify-content-between mb-2">
                        <div id="title-btns">
                            <a href="{{ route('admin.SMS.create')}}" class="btn btn-success"> <span>SMS Template</span></a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendSMSModal">
                                Send Unique SMS
                            </button>
                        </div>
                        <div class="">
                            <form method="POST" action={{route("admin.user.search")}}>
                                @csrf 
                                <div class="d-flex">
                                    <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                                    <select name="brand_type" class="btn btn-secondary dropdown-toggle" type="button">
                                        <option>All</option>
                                        <option>Recipient Name</option>
                                        <option>Recipient Number</option>
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
                        <th>SMS Type</th>
                        <th>Recipient Name</th>
                        <th>Recipient Number</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Api Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sms as $sms)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" data-id={{$sms->id}}> 
                            </td>
                            <td>{{ $sms->type }}</td>
                            <td>{{ $sms->recipient }}</td>
                            <td>{{ $sms->recipientnumber }}</td>
                            <td>{{ $sms->message }}</td>
                            <td>{{ $sms->status }}</td>
                            <td>{{ $sms->apimessage }}</td>
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

{{-- sendSMSModal --}}
<div class="modal fade" id="sendSMSModal" tabindex="-1" role="dialog" aria-labelledby="sendSMSModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendSMSModalLabel">Send Unique SMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="SMS/sendapisms">
                @csrf
                <div class="modal-body">
                    Phone:
                    <br>
                        <input type="text" class="form-control" name="phone">
                    <br>
                    <br>
                    Message:
                        <input type="text" class="form-control" name="message">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
