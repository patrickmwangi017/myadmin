@extends('layouts.app')
@section('title')
laravel Bookings
@endsection


@section('content')

@if(Session::has('booking'))
   <div class="row">  
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <ul class="list-group">
       
       @foreach($services as $service)
          <li class="list-group-item">
          <span class="badge">{{ $service['qty'] }}</span>
          <strong>{{$service ['item']['serviceName'] }}</strong>
          <span class="label label-success">Ksh. {{$service['price'] }}</span>
          <div class="btn-group">
         <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" >Action <span class="caret"></span></button>
         <ul class="dropdown-menu">
         <li><a href="#">Reduce by 1</a></li>
         <li><a href="#">Reduce all</a></li>
         </ul>
          </div>
          </li>
         
          @endforeach

    
       
       </ul>
     </div>
     </div>
     <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
   <!-- Click here if you want the goods to be delivered to your location
   <a href="" class="btn btn-success pull-right" role="button">Add to Cart</a> -->
    <strong>Total{{ $totalPrice }}</strong>
    </div>
     </div>
     <hr>
     <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <a href="{{route('servicescheckout')}}" type="button" class="btn btn-success">Services Checkout</a>
    </div>
     </div>
@else
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <h2>Your Cart Is Empty</h2>
    </div>
     </div>
@endif

@endsection


