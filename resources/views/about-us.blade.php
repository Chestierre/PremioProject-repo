@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <h1 class="text-white d-flex justify-content-center">Premio Desmark Mission and Vision Statements Analysis</h1>
            {{-- <div class="card">
                
            </div> --}}
            <div class="d-flex justify-content-between mt-4">
                <div class="card col-md-8 mx-1 p-4">
                    <div class="h3 d-flex justify-content-center">
                        Introdcution
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$companydetail->introduction}}
                    </div>
                    <div class="h3 d-flex justify-content-center mt-4">
                        Vision
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$companydetail->vision}}
                    </div>
                    <div class="h3 d-flex justify-content-center mt-4">
                        Mission
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$companydetail->mission}}
                    </div>
                    <div class="h3 d-flex justify-content-center mt-4">
                        Core Values
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$companydetail->corevalues}}
                    </div>
                    
                    

                    


                </div>

                <div class="card col-md-4 mx-1 p-4">
                    <div class="h3 d-flex justify-content-center">
                        History
                    </div>
                    <div class="d-flex justify-content-between">
                        {{$companydetail->history}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection