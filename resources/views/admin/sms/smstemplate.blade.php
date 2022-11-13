@extends('layouts.adminlayout')

@section('content')

{{-- {{ dd(Auth::user()->can('superadmin', App\Models\User::class));}} --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="d-flex justify-content-center">Edit SMS Template</h1>
            <div class="row d-flex justify-content-center">
                <a class="btn btn-primary  my-2 col-md-8" data-toggle="modal" data-target="#previewModal" id="previewButton">Preview SMS Message</a>
            </div>
            
            <div class="col-md-10 offset-md-1">
                <form action="{{ route('admin.SMS.setsmstemplate') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <label for="beforename" class="col-md-12 col-form-label">{{ __('Before Name:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="beforename" name="beforename" class="form-control" value="{{$smstemplate->beforename}}">
                    </div>

                    <div class="row mt-3">
                        <label for="inbetweennamebalance" class="col-md-12 col-form-label">{{ __('In between of Name and Balance:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="inbetweennamebalance" name="inbetweennamebalance" class="form-control" value="{{$smstemplate->inbetweennamebalance}}">
                    </div>

                    <div class="row mt-3">
                        <label for="inbetweenbalanceunitname" class="col-md-12 col-form-label">{{ __('In between of Balance and Unitname:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="inbetweenbalanceunitname" name="inbetweenbalanceunitname" class="form-control" value="{{$smstemplate->inbetweenbalanceunitname}}">
                    </div>

                    <div class="row mt-3">
                        <label for="afterunitname" class="col-md-12 col-form-label">{{ __('After Unitname:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="afterunitname" name="afterunitname" class="form-control" value="{{$smstemplate->afterunitname}}">
                    </div>
                    <button class="btn btn-success float-end col-md-2" type="submit">Save</button>
                </form>
   
            </div> 

        </div>
    </div>
</div>

{{-- preview modal --}}
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="previewModalLabel">Template Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <textarea  id="previewmodaltextarea" class="form-control" cols="30" rows="10" disabled></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#previewButton').on('click', function(e) {
                e.preventDefault();
                
                var beforename = $("#beforename").val();
                var inbetweennamebalance = $('#inbetweennamebalance').val();
                var inbetweenbalanceunitname = $('#inbetweenbalanceunitname').val();
                var afterunitname = $('#afterunitname').val();
                var message =  beforename.concat("<NAME>", inbetweennamebalance, "<BALANCE>", inbetweenbalanceunitname, "<UNITNAME>", afterunitname);
                console.log(message);
                $('#previewmodaltextarea').val(message);

            });

        });
    </script>
@endsection
