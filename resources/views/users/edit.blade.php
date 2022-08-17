@extends('users.userlayout')
@section('content')
@section('title','Edit User')
@section('keyword','Edit User')
@section('description','Edit User')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add User</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ url('users/') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ url('users/update') }}/{{$userData->id}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            <input type="text" name="firstname" class="form-control" placeholder="First  Name" value="{{$userData->firstname}}">
            @error('firstname')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
        
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Last Name:</strong>
            <input type="text" name="lastname" class="form-control" placeholder="Last Name"  value="{{$userData->lastname}}">
            @error('lastname')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Company Email" value="{{$userData->email}}">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input type="password" name="password" class="form-control" placeholder="Password">
            @error('password')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Country:</strong>
                <select class="form-control" name="country">
                    <option value="">Select Country</option>
                    
                    @foreach($countryList as $key => $val)
                        <option @if($key == $userData->country)  selected @endif value="{{ $key }}">{{ $val }}</option>
                    @endforeach                    
                     
                </select> 
                
                @error('city')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>
    
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>State:</strong>
                <input type="text" name="state" class="form-control" placeholder="state" value="{{$userData->state}}">
                @error('state')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>City:</strong>
                <input type="text" name="city" class="form-control" placeholder="country"  value="{{$userData->city}}">
                @error('city')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>TNC:</strong>
                <input type="checkbox" name="term_condition" class="form-control" @if($userData->term_condition == 'yes')  checked @endif>Term condition
                @error('term_condition')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary ml-3">Update</button>
</div>
</form>
@endsection