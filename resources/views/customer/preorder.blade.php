@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">Preorders: {{$customer->FirstName}} {{$customer->LastName}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="h2">Preoders</div>
                                </div>
                            </div>
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Unit Name</th>
                                        <th>Unit Image</th>
                                        <th>Date Ordered</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer->preorder as $preorder)
                                    <tr>
                                        <td>{{$preorder->unit->modelname}}</td>
                                        <td><img src= "/storage/{{ $preorder->unit->unitimage[0]->image }}" style="width:120px;"></td>
                                        <td>{{ $preorder->created_at->format('F d, Y')}}</td>
                                        <td><a type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
