@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1>Shipmentmanager Profile</h1>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<form action="{{URL::to('update-shipmentmanager-info', ['id'=>$user->id])}}" method="POST">

<div class="form-group">
<label for="name">Full Name</label>
<input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" id="address" name="address" class="form-control" value="{{$user->address}}">
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
</div>
<div class="form-group">
<label for="Email">E-Mail</label>
<input type="text" id="email" name="email" class="form-control" value="{{$user->email}}">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="text" id="password" name="password" class="form-control" value="{{$user->password}}">
</div>
<button type="submit" class="btn btn-primary">Update</button>
{{ csrf_field() }}
</form>
</div>
</div>
</div>
</div>
@endsection