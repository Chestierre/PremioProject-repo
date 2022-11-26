@extends('layouts.adminlayout')
@section('content')
<div class="container">

    @if (Session::get('about_us_saved'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('about_us_saved') }}
    </div>   
    @endif

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
            
            <div class="col-md-12">
                <form action="{{ route('admin.superfunc.aboutusedit') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <label for="introduction" class="col-md-12 col-form-label">{{ __('Introduction:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="introduction" name="introduction" class="form-control" value="{{$companydetail->introduction}}" >
                    </div>

                    <div class="row mt-3">
                        <label for="vision" class="col-md-12 col-form-label">{{ __('Vision:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="vision" name="vision" class="form-control" value="{{$companydetail->vision}}">
                    </div>

                    <div class="row mt-3">
                        <label for="corevalues" class="col-md-12 col-form-label">{{ __('Core Values:') }}</label>
                    </div>    
                    <div class="col-md-12">
                        <input type="text" id="corevalues" name="corevalues" class="form-control" value="{{$companydetail->corevalues}}">
                    </div>

                    <div class="row mt-3">
                        <label for="history" class="col-md-12 col-form-label">{{ __('History:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="history" name="history" class="form-control" value="{{$companydetail->history}}">
                    </div>

                    <div class="row mt-3">
                        <label for="mission" class="col-md-12 col-form-label">{{ __('Mission:') }}</label>
                    </div>    
                    <div class="col-md-12 mb-5">
                        <input type="text" id="mission" name="mission" class="form-control" value="{{$companydetail->mission}}">
                    </div>
                    <button class="btn btn-success float-end col-md-2" type="submit">Save</button>
                </form>
            </div>
        </div> 
    </div>
{{-- 
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
    
</div> --}}


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // var doc = new jsPDF()
    // var bas64img = ;

    // doc.addImage(bas64img, 'JPEG', 0, 0, 216, 275);
    // var name = "Chester"

    // doc.text(10, 10, name)
    // doc.save('a4.pdf')
</script>

@endsection