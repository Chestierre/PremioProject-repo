@extends('layouts.adminlayout')

@section('content')


<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-6 d-flex mb-2 justify-content-between">
                        <h2><b>Manage Collector</b></h2>
                        <div class="">
                            <form method="POST" action={{route("admin.user.search")}}>
                                @csrf 
                                <div class="d-flex">
                                <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">                            
                               
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
                        <th>Collector</th>
                        <th>Collector Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $count => $user)
                        @if ($user->userrole == "Collector")
                        <tr>
                            <td class = "py-3">{{ $user->username }}</td>
                            <td>{{$user->order->count()}}</td>
                            <td>
                                <form method="GET" action="{{ route('admin.collector.edit', $user) }}">
                                    <button type="submit" class="btn btn-warning" ><i class="fa-solid fa-eye"></i> View</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
