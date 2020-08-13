@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h3>Update Accountant</h3>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<table class="table">
<form action="{{URL::to('update-accountant-info', ['id'=>$accountants->id])}}" method="POST">
<tr>
<td><label for="name">Full Name</label></td>
<td><input type="text" id="name" name="name" class="form-control" value="{{$accountants->name}}"></td>
</tr>
<tr>
<td><label for="address">Email</label></td>
<td><input type="text" id="email" name="email" class="form-control" value="{{$accountants->email}}"></td>
</tr>
<tr>
<td><label for="phone">Phone Number</label></td>
<td><input type="integer" id="phone" name="phone" class="form-control" value="{{$accountants->phone}}"></td>
</tr>
<tr>
<td><label for="address">Address</label></td>
<td><input type="text" id="address" name="address" class="form-control" value="{{$accountants->address}}"></td>
</tr>
<tr>
<td><label for="password">Password</label></td>
<td><input type="text" id="password" name="password" class="form-control" value="{{$accountants->password}}"></td>
</tr>
<tr>
<td>
<button type="submit" class="btn btn-primary">Update</button>
{{ csrf_field() }}
</td>
</tr>
</form>
</table>
</div>
</div>
</div>
</div>
@endsection