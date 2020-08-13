@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="row">
<div class="col-md-4 col-md-offset-4">
<h3>Request Supply</h3>
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
<table class="table">
<form action="{{URL::to('request-supply', ['id'=>$suppliers->id])}}" method="POST">
<tr>
<td><label for="name">Company Name</label></td>
<td><input type="text" id="name" name="name" class="form-control" value="{{$suppliers->name}}"></td>
</tr>
<tr>
<td><label for="address">Email</label></td>
<td><input type="text" id="email" name="email" class="form-control" value="{{$suppliers->email}}"></td>
</tr>
<tr>
<td><label for="phone">Phone Number</label></td>
<td><input type="integer" id="phone" name="phone" class="form-control" value="{{$suppliers->phone}}"></td>
</tr>
<tr>
<td><label for="address">Product</label></td>
<td>

<select name="product" required>

                                <option value="-1">Select...</option>
                                        @foreach ($products as $product )
                                        <option value="{{ $product['productName'] }}">{{$product->productName}}</option>
                                        
                                         @endforeach
                                    </select>

<!-- <input type="text" id="product" name="product" class="form-control" value="{{$suppliers->product}}"> -->

</td>
</tr>

<tr>
<td><label for="phone">Quantity</label></td>
<td><input type="integer" id="quantity" name="quantity" class="form-control" value=""></td>
</tr>
<tr>
<td><label for="comment">Comment</label></td>
<td><input type="text" id="comment" name="comment" class="form-control" value=""></td>
</tr>
<tr>   
<td>
<button type="submit" class="btn btn-primary">Send Request</button>
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