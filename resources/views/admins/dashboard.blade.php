@extends('layouts.app')
@section('content')


<?php

$db_username = 'ppenkwpnhcycpd';
$db_password = '800d5bfb8e27c1dc45d1bce4380f4aa66d67c3072161b1584672ecd50e4d47d7';
$db_name = 'd1921tv687j8gg';
$db_host = 'ec2-50-19-26-235.compute-1.amazonaws.com';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

	//display numbers of reports
    $result=mysqli_query($mysqli,"SELECT * FROM users WHERE is_user='Pending' ") or die ("Database query failed: $query" . mysql_error());
    $result1=mysqli_query($mysqli,"SELECT * FROM accountants WHERE is_accountant='Pending' ") or die ("Database query failed: $query" . mysql_error());
    $result2=mysqli_query($mysqli,"SELECT * FROM ordermanagers WHERE is_ordermanager='Pending' ") or die ("Database query failed: $query" . mysql_error());
	$result3=mysqli_query($mysqli,"SELECT * FROM shipmentmanagers WHERE is_shipmentmanager='Pending' ") or die ("Database query failed: $query" . mysql_error());
	$result4=mysqli_query($mysqli,"SELECT * FROM stockmanagers WHERE is_stockmanager='Pending' ") or die ("Database query failed: $query" . mysql_error());
	$result5=mysqli_query($mysqli,"SELECT * FROM drivers WHERE is_driver='Pending' ") or die ("Database query failed: $query" . mysql_error());
	$result6=mysqli_query($mysqli,"SELECT * FROM masons WHERE is_mason='Pending' ") or die ("Database query failed: $query" . mysql_error());
	
	$count = mysqli_num_rows($result)+mysqli_num_rows($result1)+mysqli_num_rows($result2)+mysqli_num_rows($result3)+mysqli_num_rows($result4)+mysqli_num_rows($result5)+mysqli_num_rows($result6);
	
    $feedback=mysqli_query($mysqli,"SELECT * FROM feedback WHERE reply='' ") or die ("Database query failed: $query" . mysql_error());
    $countfeedback = mysqli_num_rows($feedback);

    $payments=mysqli_query($mysqli,"SELECT * FROM shipments WHERE payment_status='Pending' ") or die ("Database query failed: $query" . mysql_error());
    $countpayments = mysqli_num_rows($payments);

    $orders=mysqli_query($mysqli,"SELECT * FROM shipments WHERE order_shipment='Order' && payment_status='Approved' && order_status='Pending'") or die ("Database query failed: $query" . mysql_error());
    $countorders = mysqli_num_rows($orders);

    $bookings=mysqli_query($mysqli,"SELECT * FROM shipments WHERE order_shipment='Shipment' && payment_status='Approved' && booking_status='Pending'") or die ("Database query failed: $query" . mysql_error());
    $countbookings = mysqli_num_rows($bookings);
?>
<div class="row">
 <ul class="list-group">
<li class="list-group-item">
 
    <div class="col-sm-6 col-md-4">
         
        <div class="panel panel-success">
            <div class="panel-heading">
				<div class="container-fluid">
                    <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-user fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $count; ?></div>
                                        <div>All Total Users Pending Approval</div><br/>
                                    </div>
                    </div>
				</div>	
                            </div>
                            <a href="{{URL::to('adminsusers')}}">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Now</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
            </div>

    </div>

    <div class="col-sm-6 col-md-4">
         
         <div class="panel panel-default">
             <div class="panel-heading">
                 <div class="container-fluid">
                     <div class="row-fluid">
                                     <div class="span3"><br/>
                                         <i class="fa fa-inbox fa-5x"></i><br/>
                                     </div>
                                     <div class="span8 text-right"><br/>
                                         <div class="huge"><?php echo $countfeedback; ?></div>
                                         <div>All Total new feedback messages</div><br/>
                                     </div>
                     </div>
                 </div>	
                             </div>
                             <a href="{{URL::to('adminshome')}}">							  
                                 <div class="modal-footer">
                                     <span class="pull-left">View Now</span>
                                     <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                     <div class="clearfix"></div>
                                 </div>							  
                             </a>
             </div>
 
     </div>


     <div class="col-sm-6 col-md-4">
         
        <div class="panel panel-info">
            <div class="panel-heading">
				<div class="container-fluid">
                    <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-money fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $countpayments; ?></div>
                                        <div>All Total Payments Pending Approval </div><br/>
                                    </div>
                    </div>
				</div>	
                            </div>
                            <a href="{{URL::to('accountantshome')}}">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Now</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
            </div>

    </div>


    <div class="col-sm-6 col-md-4">
         
        <div class="panel panel-danger">
            <div class="panel-heading">
				<div class="container-fluid">
                    <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-clone fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $countorders; ?></div>
                                        <div>All Total Orders Pending Approval</div><br/>
                                    </div>
                    </div>
				</div>	
                            </div>
                            <a href="{{URL::to('ordermanagerhome')}}">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Now</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
            </div>

    </div>


    <div class="col-sm-6 col-md-4">
         
        <div class="panel panel-primary">
            <div class="panel-heading">
				<div class="container-fluid">
                    <div class="row-fluid">
                                    <div class="span3"><br/>
                                        <i class="fa fa-book fa-5x"></i><br/>
                                    </div>
                                    <div class="span8 text-right"><br/>
                                        <div class="huge"><?php echo $countbookings; ?></div>
                                        <div>All Total Bookings Pending Approval</div><br/>
                                    </div>
                    </div>
				</div>	
                            </div>
                            <a href="{{URL::to('ordermanagerallbookings')}}">							  
                                <div class="modal-footer">
                                    <span class="pull-left">View Now</span>
                                    <span class="pull-right"><i class="icon-chevron-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>							  
                            </a>
            </div>


    </div>


    

                            </li>
                            
                            
                            </ul>
                            
				
                   


@endsection

