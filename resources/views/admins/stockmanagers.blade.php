@extends('layouts.app')



@section('content')
<strong>All Stockmanagers</strong>
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="col-md-16">
    <form action="{{URL::to('/searchallstockmanagers')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchallstockmanagers" class="form-control" placeholder="search stockmanagers by name, Email or status">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
            <span class="glyphicon-search"></span></button>
        </span>
    </div>

</form>
</div>
<div class="col-md-5">
<div class="box box-default box-solid">
<div class="box-header with-border">

                    <h3 class="box-title">Add new Shipmentmanager</h3>
                    <a href="#addSupplyer" role="button" class="btn btn-warning btn-sm  pull-right" title="Add new Product" data-toggle="modal"><i class="fa fa-user-plus" ></i></a>



                    <!-- /.box-tools -->
                </div>
                </div>
                </div>


<!-- <div class="table-responsive"> -->
<table class="table">
<thead class="text-primary">
<th>ID</th>
<th>Full Name</th>
<!-- <th>Paid<br>for</th> -->
<th>Email</th>
<th>Phone Number</th>
<th>Address</th>
<th>Status</th>
<th>Actions</th>
</thead>
<tbody>
@foreach ($stockmanagers as $row )
<tr>
<td>{{$row->id}}</td>
<td>{{$row->name}}</td>

<td>{{$row->email}}</td>
<td>{{$row->phone}}</td>
<td>{{$row->address}}</td>
<td>{{$row->is_stockmanager}}</td>

<td>@if($row->is_stockmanager == "Approved")<a href="{{route('is_stockmanagerarchive', ['id'=>$row->id])}}" class="btn btn-danger" > ARCHIVE </a>
<br>
<a href="{{route('is_stockmanageredit', ['id'=>$row->id])}}" class="btn btn-info" > Manage </a>
@elseif($row->is_stockmanager == "Archived")<a href="{{route('is_stockmanagerapprove', ['id'=>$row->id])}}" class="btn btn-success" > Unarchive </a>
@elseif($row->is_stockmanager == "Rejected")<a href="{{route('is_stockmanagerapprove', ['id'=>$row->id])}}" class="btn btn-success" > Approve </a>
@elseif($row->is_stockmanager == "Pending")<a href="{{route('is_stockmanagerapprove', ['id'=>$row->id])}}" class="btn btn-success" > Approve </a>
<br>
<a href="{{route('is_stockmanagerreject', ['id'=>$row->id])}}" class="btn btn-info" > Reject </a>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="modal fade" id="addSupplyer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new Stockmanager</h4>
                    </div>
                    <div class="modal-body">
     
                    <form action="{{URL::to('add_new_stockmanager')}}" method="POST">
                        <table class="table">

                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td>Full Name</td>
                                    <td><input type="text" id="name" name="name" required/>
                                    
                                    </td>

                                </tr>


                                <tr>
                                    <td></td>
                                    <td>Email</td>


                                    <td><input type="text" id="email" name="email" /></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Phone Number</td>


                                    <td><input type="number" id="phone" name="phone" /></td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td>Address</td>


                                    <td><input type="text" id="address" name="address" /></td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td>Password</td>


                                    <td><input type="password" id="password" name="password" /></td>

                                </tr>
                              
                                <tr>
                                    <td></td>

                                    <td></td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                        <!-- data-dismiss="modal" -->
                        <button type="submit" class="btn btn-success btn-sm">SAVE</button>
                        {{ csrf_field() }}
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        
@endsection
