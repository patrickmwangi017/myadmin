@extends('layouts.app')



@section('content')
<h5>All Bookings</h5>
<div class="col-md-16">
    <form action="{{URL::to('/searchshipmentallbookings')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchshipmentallbookings" class="form-control" placeholder="search Booking by name or address">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
            <span class="glyphicon-search"></span></button>
        </span>
    </div>

</form>
</div>


<!-- <div class="table-responsive"> -->
<table class="table">
<thead class="text-primary">
<th>Booking<br>Id</th>
<th>Cust Name</th>
<th>Booked Services</th>
<th>Address</th>
<th>Allocation</br>Status</th>
<th>ACTION</th>

</thead>
<tbody>
@foreach ($shipments as $row )
@if($row->booking_status == "Approved")
<tr>
<td>{{$row->bookedservice_id}}</td>
<td>{{$row->name}}</td>
<td>

<div class="panel panel-default">
<div class="panel-body">
<ul class="list-group">
@foreach($row->booking->items as $item)
<li class="list-group-item">
 <span class="badge"> {{$item['price']}} </span> 
 {{ $item['item']['serviceName']}}  | {{$item['qty']}} Units
 </li>
@endforeach
</ul>
</div>
<div class="panel-footer">
<strong>Total Price: {{$row->booking->totalPrice}}</strong>
</div>
</div>

</td>
<td>{{$row->address}}</td>

<td>@if($row->allocation_status == "Pending") Pending 
@elseif($row->allocation_status == "Allocated") Allocated
 @endif</td>
 
<td><a href= class="btn btn-info" > Allocate </a>
</br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>


<!-- <a href="{{route('payment_archive', ['id'=>$row->id])}}"> ARCHIVE </a></td> -->

</tr>

@endif
@endforeach
</tbody>
</table>
</div>
@endsection
