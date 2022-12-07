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
                                        <td><a type="button" class="btn btn-danger" onclick="loadDeleteModal({{ $preorder->id }}, `{{ $preorder->unit->modelname }}`)"><i class="fa-solid fa-trash-can"></i> Delete</a></td>
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

{{-- modal delete on-click --}}
<div class="modal fade" id="deleteCategory"  tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">This action is not reversible.</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
       
            <div class="modal-body">
                Are you sure you want to delete <span id="modal-category_name"></span>?
                <div id="deletecustomerrelation"></div>
                <input type="hidden" id="category" name="category_id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-white" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="modal-confirm_delete">Delete</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    <script type="text/javascript">
        function loadDeleteModal(id, name) {
            $('#modal-category_name').html(name);
            $('#deleteCategory').modal('show');
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        }

        function confirmDelete(id) {
            $.ajax({
                url: 'PreorderDelete/' + id,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function (data) {
                    

                $('#deleteCategory').modal('hide');
                location.reload();
                },
                error: function (error) {
                    
                }
            });
        }

    </script>

@endsection