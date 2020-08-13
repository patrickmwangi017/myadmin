@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1>Sign In</h1>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<form action="{{route('user.signin')}}" method="POST">
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
<button type="submit" class="btn btn-primary">Sign In</button>
{{ csrf_field() }}
</form>
<p>Don't have an account? <a href="{{ route('user.signup')}}">Sign up instead </a></p>
</div>
</div>
@endsection