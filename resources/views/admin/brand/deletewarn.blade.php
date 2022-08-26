@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="d-flex justify-content-between my-2">
                        <h2><b>Affected Files</b></h2>
                        {{-- <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteBrandModal"> <span class = "">Delete?</span></a> --}}
                        <form method="POST" action="{{ route('admin.brand.destroy', $object) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" > Delete?</button>
                        </form>
                    </div>
                    
                <table class = "table">
                    <thead class = "table-dark">
                    <tr>
                        <th>Model Name</th>
                        <th>Model Brand</th>
                    <tr>
                    </thead>
                    <tbody>
                        @foreach ($unit as $unit)
                        <tr>
                          <td>{{ $unit->modelname }}</td>
                          <td>{{ $unit->brand->brandname }}</td>
                        </tr>
                      
                    @endforeach
                        </tbody>
                </table> 
        </div>
    </div>
        
    </div>
</div>
</div>
@endsection

