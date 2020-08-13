@extends('layouts.app')



@section('content')
<strong>All Suppliers</strong>
@if(session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<div class="col-md-16">
    <form action="{{URL::to('/searchallsuppliers')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchallsuppliers" class="form-control" placeholder="search supplier by name, Email or status">
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

                    <h3 class="box-title">Add new Supplier</h3>
                    <a href="#addSupplyer" role="button" class="btn btn-warning btn-sm  pull-right" title="Add new Product" data-toggle="modal"><i class="fa fa-user-plus" ></i></a>



                    <!-- /.box-tools -->
                </div>
                </div>
                </div>


<!-- <div class="table-responsive"> -->
<table class="table">
<thead class="text-primary">
<th>ID</th>
<th>Company Name</th>
<!-- <th>Paid<br>for</th> -->
<th>Email</th>
<th>Phone Number</th>
<th>Products</th>
<th>Status</th>
<th>Actions</th>
<!-- <th>Request Supply</th> -->
</thead>
<tbody>
@foreach ($suppliers as $row )
<tr>
<td>{{$row->id}}</td>
<td>{{$row->name}}</td>

<td>{{$row->email}}</td>
<td>{{$row->phone}}</td>
<td>{{$row->product}}</td>
<td>{{$row->is_supplier}}</td>

<td>@if($row->is_supplier == "Approved")<a href="{{route('is_supplierarchive', ['id'=>$row->id])}}" class="btn btn-danger" > ARCHIVE </a>
<br>
<a href="{{route('is_supplieredit', ['id'=>$row->id])}}" class="btn btn-info" > Manage </a>
@elseif($row->is_supplier == "Archived")<a href="{{route('is_supplierapprove', ['id'=>$row->id])}}" class="btn btn-success" > Unarchive </a>
@elseif($row->is_supplier == "Rejected")<a href="{{route('is_supplierapprove', ['id'=>$row->id])}}" class="btn btn-success" > Approve </a>
@elseif($row->is_supplier == "Pending")<a href="{{route('is_supplierapprove', ['id'=>$row->id])}}" class="btn btn-success" > Approve </a>
<br>
<a href="{{route('is_supplierreject', ['id'=>$row->id])}}" class="btn btn-info" > Reject </a>
@endif
</td>
<td><a href="{{route('is_requestsupply', ['id'=>$row->id])}}" class="btn btn-primary" >Request Supply</a></td>
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
                        <h4 class="modal-title">Add new supplier</h4>
                    </div>
                    <div class="modal-body">
     
                    <form action="{{URL::to('add_new_supplier')}}" method="POST">
                        <table class="table">

                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td>Company Name</td>
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
                                    <td>Product</td>
                                    <td>
                                    <select name="cat" required>

                                <option value="-1">Select...</option>
                                        @foreach ($products as $product )
                                        <option value="{{ $product['productName'] }}">{{$product->productName}}</option>
                                        
                                         @endforeach
                                    </select>
                                    <!-- <td><button type="submit" class="btn btn-info">Allocate</button></td> -->
                                      
                                   

                                    <!-- <td><input type="text" id="product" name="product" /></td> -->
                                    </td>
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
