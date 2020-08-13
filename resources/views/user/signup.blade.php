@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1>Sign Up</h1>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<form action="{{route('user.signup')}}" method="POST">
<div class="form-group">
<label for="name">Full Name</label>
<input type="text" id="name" name="name" class="form-control">
@if ($errors->has('name'))
<span class="help-block">
 <strong>{{ $errors->first('name') }}</strong>
 </span>
@endif
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" id="address" name="address" class="form-control">
@if ($errors->has('address'))
<span class="help-block">
 <strong>{{ $errors->first('address') }}</strong>
 </span>
@endif
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" id="phone" name="phone" class="form-control">
@if ($errors->has('phone'))
<span class="help-block">
 <strong>{{ $errors->first('phone') }}</strong>
 </span>
@endif
</div>
<div class="form-group">
<label for="Email">E-Mail</label>
<input type="text" id="Email" name="Email" class="form-control">
@if ($errors->has('Email'))
<span class="help-block">
 <strong>{{ $errors->first('Email') }}</strong>
 </span>
@endif
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" id="password" name="password" class="form-control">
@if ($errors->has('password'))
<span class="help-block">
 <strong>{{ $errors->first('password') }}</strong>
 </span>
@endif
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" id="password-confirm" name="password_confirmation" class="form-control">
@if ($errors->has('password'))
<span class="help-block">
 <strong>{{ $errors->first('password') }}</strong>
 </span>
@endif
</div>
<button type="submit" class="btn btn-primary">Sign Up</button>
{{ csrf_field() }}
</form>
</div>
</div>
@endsection