@extends('users.userlayout')
@section('content')
@section('title','User')
@section('keyword','User')
@section('description','User')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>User</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ url('users/create') }}"> Create User</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>

<th>First Name</th>
<th>Aast Name</th>
<th>Email</th>
<th>Country</th>
<th width="280px">Action</th>
</tr>
@foreach ($userlists as $value)
<tr>
<td>{{ $value->firstname }}</td>
<td>{{ $value->lastname }}</td>
<td>{{ $value->email }}</td>
<td>{{ $countryList[$value->country] }}</td>
<td>
<a  class="btn btn-primary" href="{{ url('users/edit/'.$value->id) }}">Edit</a>
|
<a  class="btn btn-danger" href="{{ url('users/delete/'.$value->id) }}" onclick="return confirm('Are you sure?');">Delete</a>
    
</td>
</tr>
@endforeach
</table>
{!! $userlists->links() !!}
<style>
    .hidden{
        display:none;
    }
</style>
@endsection
