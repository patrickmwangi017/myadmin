<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Suppliers Report</title>
  <style>
    @include('PDF.style')
  </style>
</head>
<body>
<header class="clearfix">
  <div id="logo">
    {{--<img src="logo.png">--}}
  </div>
  <h3>Suppliers Report</h3>

  <div id="company" class="clearfix" style="padding-right: 50px;">

    <div>Kanini Haraka Enterprises</div>
    <div>P.O Box 267,
    </div>
    <div>Meru</div>

    <div><a href="mailto:davin@gmail.com">davin@gmail.com"</a></div>
  </div>


</header>

<hr>

<table style="padding-top: 10px;">
        <thead>
        <tr>
		<th class="service">No</th>
          <th class="service">User ID</th>
          <th class="service">Name</th>
          <th class="desc">Email</th>
          <th class="desc">Product</th>
		  <th class="desc">Status</th>
        </tr>
        </thead>
        <tbody>
        @php
          $i=0;
        @endphp
		@foreach ($suppliers as $row )
          <tr>
            <td class="service">{{++$i}}</td>
            <td class="desc">{{$row->id}}</td>
            <td class="desc">{{$row->name}}</td>
			<td class="desc">{{$row->email}}</td>
            <td class="qty">{{$row->product}}</td>
            <td class="unit">
			 @if($row->is_driver == "Pending")Pending     
             @elseif($row->is_supplier == "Approved")Approved
			 @elseif($row->is_supplier == "Rejected")Rejected
			 @elseif($row->is_supplier == "Archived")Archived
             @endif
            </td>
        
          </tr>
@endforeach

        </tbody>
      </table>


	
</body>
</html>

