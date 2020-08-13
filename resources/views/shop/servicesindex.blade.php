@extends('layouts.app')
@section('title')
laravel shopping cart
@endsection


@section('content')



<div class="col-md-12">
    <form action="{{URL::to('/searchservices')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchservices" class="form-control" placeholder="search services by service name, price or description">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
            <span class="glyphicon-search"></span></button>
        </span>
    </div>

</form>
</div>



@foreach($services->chunk(3) as $serviceChunk)
<div class="row">
@foreach($serviceChunk as $service)
<div class="col-sm-6 col-md-4">
<div class="thumbnail">
<!-- {{$service->Picture}} -->
<img src="images/{{$service->Picture}}" alt="..." class="img-responsive">
<!-- asset('images/1.png') -->
<div class="caption">
<h3>{{$service->serviceName}}</h3>
<p class="description">{{ $service->Description}}</p>
<div class="clearfix">
<div class="pull-left price">Ksh. {{$service->Price}} per hour</div>
<a href="{{route('service.addToBooking', ['id'=> $service->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
</div>
</div>
</div>
</div>
@endforeach
</div>
@endforeach
@endsection
