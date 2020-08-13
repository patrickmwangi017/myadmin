@extends('layouts.app')
@section('content')

<strong>All Customer Feedback Messages</strong>
<a href="{{route('admins/archived')}}" class="btn btn-info pull-right">See Archive</a>
<br>
<br>
<div class="col-md-16">
    <form action="{{URL::to('/searchallpayments')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchallpayments" class="form-control" placeholder="search payment by mpesa-code, status or amount">
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
<th>Feedback_id</th>
<th>User_id</th>
<th>User Name</th>
<th>User Phone</th>
<th>User Email</th>
<th>Message</th>
<th>Reply</th>
<th>Action</th>

</thead>
<tbody>
@foreach ($feedback as $row )
@if($row->status=="Pending")
<tr>
<td>{{$row->id}}</td>
<td>{{$row->user_id}}</td>
<td>{{$row->name}}</td>
<td>{{$row->telephone}}</td>
<td>{{$row->Email}}</td>
<td>{{$row->feedbackMessage}}</td>
<td>{{$row->reply}}</td>

<!-- <td>@if($row->status == 0) PENDING @else APPROVED @endif</td> -->
<td>@if($row->reply !="")Replied 
<br>
<a href="{{route('feedback_archive', ['id'=>$row->id])}}" class="btn btn-danger"> Archive </a>
@else 
<a href="{{route('inbox', ['id'=>$row->id])}}" class="btn btn-success"> Reply </a>
 @endif</td>
 
</tr>
@endif
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
                        <h4 class="modal-title">Add new Product</h4>
                    </div>
                    <div class="modal-body">
                    <form action="{{URL::to('add_new_product')}}" method="POST">
                        <table class="table">

                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td>Product Name</td>
                                    <td><input type="text" id="productName" name="productName" required/></td>

                                </tr>


                                <tr>
                                    <td></td>
                                    <td>Product Description</td>


                                    <td><input type="text" id="Description" name="Description" /></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Price per Unit</td>


                                    <td><input type="number" id="Price" name="Price" /></td>

                                </tr>

                                <tr>
                                    <td></td>
                                    <td>Quantity Available</td>


                                    <td><input type="number" id="quantity_available" value="0" name="quantity_available" /></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Picture</td>


                                    <td><input type="file" id="Picture" name="Picture" /></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Status</td>


                                    <td><select id="status" name="status" required>
                                <option value="-1">Select...</option>

                                <option value="Published">Published</option>
                                <option value="Archived">Archived</option>

                            </select></td>


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
