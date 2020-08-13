@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h3>Update Customer</h3>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<table class="table">
<form action="{{URL::to('update-user-info', ['id'=>$users->id])}}" method="POST">
<tr>
<td><label for="name">Full Name</label></td>
<td><input type="text" id="name" name="name" class="form-control" value="{{$users->name}}"></td>
</tr>
<tr>
<td><label for="address">Email</label></td>
<td><input type="text" id="Email" name="Email" class="form-control" value="{{$users->Email}}"></td>
</tr>
<tr>
<td><label for="phone">Phone Number</label></td>
<td><input type="integer" id="phone" name="phone" class="form-control" value="{{$users->phone}}"></td>
</tr>
<tr>
<td><label for="Email">Postal Town</label></td>
<td><input type="integer" id="town" name="town" class="form-control" value="{{$users->town}}"></td>
</tr>
<tr>
<td><label for="address">Postal Address</label></td>
<td><input type="text" id="postaladdress" name="postaladdress" class="form-control" value="{{$users->postaladdress}}"></td>
</tr>
<tr>
<td><label for="password">Password</label></td>
<td><input type="text" id="password" name="password" class="form-control" value="{{$users->password}}"></td>
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