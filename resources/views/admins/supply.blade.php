@extends('layouts.app')

@section('content')
All My Requested Supplies
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="col-md-16">
    <form action="{{URL::to('/searchsupplyall')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchsupplyall" class="form-control" placeholder="search supplies by product, ID, quantity or comment">
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

<th>Supply ID</th>
<th>Product</th>
<th>Quantity</th>
<th>Comment</th>
<th>Request Status</th>
<th>supply status</th>
<th>confirmation status</th>

</thead>
<tbody>
@foreach ($supplies as $row )
<tr>
<td>{{$row->id}}</td>

<td>{{$row->product}}</td>
<td>{{$row->quantity}}</td>
<td>{{$row->comment}}</td>
<td>
@if($row->request_status=="Pending")Pending
@elseif ($row->request_status=="Accepted")Accepted
@elseif ($row->request_status=="Rejected")Rejected
@endif
</td>
<td>
@if($row->supply_status=="Pending")Pending
@elseif ($row->supply_status=="Done")Supplied
@endif
</td>
<td>
@if($row->receive_status=="Pending" && $row->supply_status=="Pending")Awaiting Supply
@elseif ($row->receive_status=="Pending" && $row->supply_status=="Done")
<a href="{{route('is_supplyconfirmed', ['id'=>$row->id])}}" class="btn btn-success" >Confirm</a>
@elseif ($row->receive_status=="Received")Confirmed
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
