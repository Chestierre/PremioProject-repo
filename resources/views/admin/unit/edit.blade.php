@extends('layouts.adminlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Unit') }} {{$unit->modelname}} <button type="button" class="mx-2 btn btn-secondary" data-toggle="modal" data-target="#unitReportModal"><i class="fa-regular fa-lightbulb"></i></button></div>

                
                <div class="card-body">
            
                    
                    <form method="POST" action="{{ route('admin.unit.update', $unit)}}">
                        @method('PUT')
                        @csrf
                        Model Name:
                        <br>
                        <input type="text" class="mb-3 form-control" name="modelName" value ="{{ $unit->modelname }}" />
                        
                        <div class="d-flex">
                            <p class="">Brand:</p>
                            <select name="brandName" class="mx-3 mb-2 btn btn-secondary dropdown-toggle" type="button">
                                @foreach ($brand as $brands)
                                    @if ($unit->brand_id == $brands->id)
                                        <option value="{{$brands->id}}" selected>{{$brands->brandname}}</option>    
                                    @else
                                        <option value="{{$brands->id}}">{{$brands->brandname}}</option>    
                                    @endif
            
                                @endforeach
                            </select>
                        </div>
                
                        Model Description:
                        <input type="text" class="mb-2 form-control" name="modeldescription" value ="{{ $unit->modeldescription }}" />

                        Price:
                        <input type="text" class="mb-2 form-control" name="price" value ="{{ $unit->price }}" />
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"> Save </button>
                            <a href = {{ URL::previous() }} type="button" class="btn btn-success"> Go Back </a>
                        </div>
                    </form>

                    <div class="mt-2  d-flex mb-2">
                        <div>
                            Variations:
                        </div>
                        <div class="mx-2">
                            <a href="#" class="btn btn-success col-sm" data-toggle="modal" data-target="#createVariationModal"> <span class = "">Add New Variation</span></a>
                        </div>
                    </div>
                    
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Variation Number</th>
                                <th>Image</th>
                                <th>Variation Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit->unitimage as $unitimage)
                            <tr>
                                
                                <td>{{$unitimage->id}}</td>
                                <td><img src="/storage/{{ $unitimage->image }}" class="card-img-top w-25 h-25" alt="..."></td>
                                <td>{{$unitimage->ImageVariation}}</td>
                                <td><button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i> Delete</button></td>                                    
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Unit Reporting Modal --}}
<div class="modal fade" id="unitReportModal" tabindex="-1" role="dialog" aria-labelledby="unitReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="unitReportModalLabel">Reporting for Unit: {{$unit->modelname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p class="">Total Number of Orders this unit got: {{$unit->order->count()}}</p>
            <p class="">Total Number of Orders this unit got this month: {{$unit->order->where('created_at', '>', now()->subDays(30))->count()}}</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

{{-- create variation modal --}}
<div class="modal fade" id="createVariationModal" tabindex="-1" role="dialog" aria-labelledby="createVariationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createVariationModalLabel">Create Variation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST"  enctype="multipart/form-data" action="{{ route('admin.unit.variationStore', $unit) }}">
            @csrf

            <div class="row mb-3">
                <label for="imageLabel" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                <div class="col-md-6">
                  <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" >
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="captionLabel" class="col-md-4 col-form-label text-md-end">{{ __('Variation Name') }}</label>
                <div class="col-md-6">
                  <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption">

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
 
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>

@endsection
