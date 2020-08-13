@extends('layouts.app')
@section('title')
laravel shopping cart
@endsection


@section('content')
<div class="row">  
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
    <h1>Feedback</h1>
    <h4>Feedback from: {{ Auth::user()->Email }}</h4>
    <!-- <form action="{{route('checkout')}}" method="post id="checkout-form"> -->
    <form id="formElem" name="formElem"  action="{{route('feedback')}}" method="POST" class="myForm">
    <div class="row"> 
    <div class="col-xs-12">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="form-control" name="name"  required>
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label for="Email">Email</label>
    <input type="text" id="Email" class="form-control" name="Email"  required>
    </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label for="telephone">telephone</label>
    <input type="integer" id="telephone" class="form-control" name="telephone"  required>
    </div>
    </div>
    
    <div class="col-xs-12">
    <div class="form-group">
    <label for="mpesa_code">Feedback message</label>
    <input type="text" id="feedbackMessage" class="form-control" name="feedbackMessage"  required>
    </div>
    </div>
<button type="submit" class="btn btn-success">Buy now</button>
{{ csrf_field() }}
    </form>
    </div>
    </div>
   
@endsection