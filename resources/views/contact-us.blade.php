@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Contact us
                </div>
                <div class="card-body">
                    @if (Session::get('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('contact.sendEmail')}}" enctype="multipart/form-data">
                        @csrf
                        @auth
                            <div class="form-group my-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{auth()->user()->customer->FirstName}} {{auth()->user()->customer->LastName}}" class="form-control" disabled/>
                            </div>
                            <div class="form-group my-2">
                                <label for="email" >email</label>
                                <input type="text" name="email" value="{{auth()->user()->customer->email}}" class="form-control" disabled/>
                            </div>
                            <div class="form-group my-2">
                                <label for="phone" >Phone</label>
                                <input type="text" name="phone" value="{{auth()->user()->customer->MobileNumber}}" class="form-control" disabled/>
                            </div>
                            <div class="form-group my-2">
                                <label for="msg">Message</label>
                                <textarea name="msg" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>    
                        @endauth
                        @guest
                            <div class="form-group my-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group my-2">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control" />
                            </div>
                            <div class="form-group my-2">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" />
                            </div>
                            <div class="form-group my-2">
                                <label for="msg">Message</label>
                                <textarea name="msg" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            
                        @endguest
                        
                        <button type="submit" class="btn btn-secondary float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection