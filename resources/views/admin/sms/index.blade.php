@extends('layouts.adminlayout')

@section('content')


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <h2><b>SMS testing</b></h2>
                        <a href="#" class="btn btn-success"> <span>Add New Promo</span></a>
                    </div>
                </div>

                <form method="POST" action="https://smsgateway.servicesforfree.com/api/send?key=35a6b5c9d8220cd2a1febe5376bb70c65df94bfe">
                Phone:
                <br>
                    <input type="text" class="form-control" name="phone">
                <br>
                <br>
                Message:
                    <input type="text" class="form-control" name="message">
                <br>
                <button type="submit" class="btn btn-primary"> Save </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
