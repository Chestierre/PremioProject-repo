@extends('layouts.adminlayout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center mb-3">
        <h1>Super Adminstrator Functions</h1>
    </div>
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">CSV import and export function for users</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
            <form action="{{ route('admin.user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">
                        Import User Data
                </button>
                <a class="btn btn-warning" href="{{ route('admin.user.export-users') }}">
                            Export User Data
                </a>
            </form>
        </div>
    </div>
    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex mb-3">
                <div class="h4">About Us Configuration</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>

            <div class="row d-flex justify-content-center">
                <a class="btn btn-primary  my-1 col-md-10" data-toggle="modal" data-target="#previewModal" id="previewButton">Preview SMS Message</a>
            </div>
            
            <div class="col-md-12">
                <form action="{{ route('admin.SMS.setsmstemplate') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <label for="beforename" class="col-md-12 col-form-label">{{ __('Before Name:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="beforename" name="beforename" class="form-control" >
                    </div>

                    <div class="row mt-3">
                        <label for="inbetweennamebalance" class="col-md-12 col-form-label">{{ __('In between of Name and Balance:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="inbetweennamebalance" name="inbetweennamebalance" class="form-control" >
                    </div>

                    <div class="row mt-3">
                        <label for="inbetweenbalanceunitname" class="col-md-12 col-form-label">{{ __('In between of Balance and Unitname:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="inbetweenbalanceunitname" name="inbetweenbalanceunitname" class="form-control">
                    </div>

                    <div class="row mt-3">
                        <label for="afterunitname" class="col-md-12 col-form-label">{{ __('After Unitname:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="afterunitname" name="afterunitname" class="form-control">
                    </div>
                    <button class="btn btn-success float-end col-md-2" type="submit">Save</button>
                </form>
            </div>
        </div> 
    </div>

    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">Deleted Units Brand</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">Buy Product: Order Applications</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>

            User with order buttons in which what orders the user blah. must have customer info
        </div>
    </div>

    <div class="row mb-1">
        <div class="shadow-lg p-5 mb-4 bg-white rounded">
            <div class="d-flex">
                <div class="h4">report generation</div>
                <span class="mx-2"><i class="fa-regular fa-circle-question" data-toggle="tooltip" data-placement="bottom" title="Function stated in the study"></i></span>    
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection