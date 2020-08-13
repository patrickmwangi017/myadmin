<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kanini Haraka Enterprises</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="{{ asset('js/everythingSangitLesuJS.js')}}"></script>
    <!-- <script src="js/everythingSangitLesuJS.js"></script> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('styleResource/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- <link href="styleResource/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('styleResource/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- <link href="styleResource/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/everythingSangitCSS.css')}}">
    <!-- <link href="css/everythingSangitCSS.css" rel="stylesheet"> -->

    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('scripts')



    <style>
.body {
	background:url(../../images/gadgets.jpg)no-repeat center center fixed ;
		-webkit-background-size: cover !important; 
	-moz-background-size: cover !important; 
	-o-background-size: cover !important; 
	background-size: cover !important; 
}
.setfooter
{
	float:none;
	padding-left:150px;
}

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: green;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 15px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframesfadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframesfadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframesfadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframesfadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        .spinner {
            width: 55px;
            height: 55px;

            z-index: 9999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: fixed;
            display: block;
            margin: auto;
        }

        .double-bounce1,
        .double-bounce2 {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: darkred;
            opacity: 0.6;
            position: absolute;
            top: 0;
            left: 0;

            -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
            animation: sk-bounce 2.0s infinite ease-in-out;
        }

        .double-bounce2 {

            background-color: #0b3e6f;

        }

        .double-bounce2 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        @-webkit-keyframessk-bounce {
            0%,
            100% {
                -webkit-transform: scale(0.0)
            }
            50% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframessk-bounce {
            0%,
            100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            }
            50% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
            }
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 54px;
            height: 27px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: green;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Google Font -->
</head>
@if (Auth::guest())
<body class="hold-transition skin-blue sidebar-mini">






<div class="wrapper">

        <header class="main-header">
           
        <nav class="navbar navbar-static-top">
            
                <div class="navbar-custom-menu">
                    
                </div>
              
            </nav>
        </header>

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">{{Request::path()}}</li>

                </ol>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <br> @yield('content')
            </section>
            <!-- /.content -->
            <div id="snackbar">Data updated successfully.</div>

        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                
            </div>
        </footer>

 <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

@else
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                {{-- <span class="logo-mini"><img src="#" width="50px" height="40px"></span> --}}

                 <!-- logo for regular state and mobile devices -->
           <span class="logo-lg">Kanini Haraka Enterprises Admin</b></span>
           
                <!-- <span class="logo-lg">WELCOME</b></span> -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            
            
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle-o"> {{ Auth::user()->name }}</i></a>

                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                <!-- <img src="images/favicon.png" class="img-circle" alt=""> -->

                                    <p>
                                    {{ Auth::user()->name }}
                                        <small>System admin</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body"> -->

                                    <!-- /.row -->
                                    </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                <div class="pull-left">
                                        <a href="{{URL::to('adminprofile')}}" class="btn btn-default btn-flat"> <i class="fa fa-user"></i>Manage Profile</a>
                                    </div>

                                    <div class="pull-right">
                                        <a href="{{URL::to('adminslogout')}}" class="btn btn-default btn-flat"> <i class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
              
            </nav>
        </header>
    
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
               
<ul class="sidebar-menu" data-widget="tree">
                 <li>
                        <a href="{{URL::to('adminshome')}}">
                        <i class="fa fa-sign-out"></i>
                        <span>Feedback</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>User Profile</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('adminprofile')}}"><i class="fa fa-clone"></i> Update Profile</a></li>
                           
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Manage App Users</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('adminsusers')}}"><i class="fa fa-clone"></i> All Customers</a></li>
                            <li><a href="{{URL::to('adminsaccountants')}}"><i class="fa fa-money"></i> All Accountants</a></li>
                            <li><a href="{{URL::to('adminssuppliers')}}"><i class="fa fa-money"></i> All Suppliers</a></li>
                            <li><a href="{{URL::to('adminsshipmentmanagers')}}"><i class="fa fa-money"></i> All Order/Shipment managers</a></li>
                            <li><a href="{{URL::to('adminsdrivers')}}"><i class="fa fa-money"></i> All Drivers</a></li>
                        </ul>
                    </li>

                   
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Manage Payments</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('accountantshome')}}"><i class="fa fa-clone"></i> All Payments</a></li>
                            <li><a href="{{URL::to('accountantspending')}}"><i class="fa fa-money"></i> Pending Payments</a></li>
                            <li><a href="{{URL::to('accountantsapproved')}}"><i class="fa fa-money"></i> Approved Payments</a></li>
                            <li><a href="{{URL::to('accountantsrejected')}}"><i class="fa fa-money"></i> Rejected Payments</a></li>
                            <li><a href="{{URL::to('accountantsrefunded')}}"><i class="fa fa-money"></i> Refunded Payments</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Manage Supplies</span>

                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('adminssupply')}}"><i class="fa fa-clone"></i> All Supplies</a></li>
                            
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span> Manage Orders</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{URL::to('shipmentmanagerhome')}}"><i class="fa fa-clone"></i> All Orders</a></li>
                            <li><a href="{{URL::to('shipmentmanagerpendingorders')}}"><i class="fa fa-money"></i>Orders Pending Allocation</a></li>
                            <li><a href="{{URL::to('shipmentmanagerallocatedorders')}}"><i class="fa fa-money"></i> Allocated Orders</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Manage Stock</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('stockmanagerhome')}}"><i class="fa fa-clone"></i> All Products</a></li>
                            <li><a href="{{URL::to('stockmanagerpublished')}}"><i class="fa fa-money"></i> Published Products</a></li>
                            <li><a href="{{URL::to('stockmanagerarchived')}}"><i class="fa fa-money"></i>Archived Products</a></li>
                            
                        </ul>
                    </li>

                   
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Generate Reports</span>
                            <span class="pull-right-container">
                            </span>                      
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="{{URL::to('accountantsreport')}}"><i class="fa fa-clone"></i>Finance Controllers Report</a></li>
                        <li><a href="{{URL::to('shipmentmanagersreport')}}"><i class="fa fa-clone"></i>Shipmentmanagers Report</a></li>
                        <li><a href="{{URL::to('driversreport')}}"><i class="fa fa-clone"></i>Drivers Report</a></li>                        
                        <li><a href="{{URL::to('customersreport')}}"><i class="fa fa-clone"></i>Customers Report</a></li>
                            <li><a href="{{URL::to('accountantspaymentreport')}}"><i class="fa fa-clone"></i>Payment Report</a></li>
                            <!-- <li><a href="{{URL::to('ordermanagerordersreport')}}"><i class="fa fa-money"></i> Orders Report</a></li> -->
                            <li><a href="{{URL::to('shipmentmanagershipmentreport')}}"><i class="fa fa-money"></i> Shipment Report</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{URL::to('adminslogout')}}">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                    </li>
                </ul>


            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">{{Request::path()}}</li>

                </ol>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <br> @yield('content')
            </section>
            <!-- /.content -->
            <div id="snackbar">Data updated successfully.</div>

        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0 Beta
            </div>
        </footer>

        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

        @endif
       

    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('scripts')
    <script>
        $(function() {
            dinamicMenu();

            $(".spinner").css("display", "none");

        });

        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $(".spinner").css("display", "block");
            });
            $(document).ajaxComplete(function() {
                $(".spinner").css("display", "none");
            });

        });

        function showSnakBar() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function dinamicMenu() {
            var url = window.location;

            $('ul.sidebar-menu a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');

            // Will only work if string in href matches with location
            $('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
            // Will also work for relative and absolute hrefs
            $('.treeview-menu li a').filter(function() {
                return this.href == url;
            }).parent().parent().parent().addClass('active');
        };
    </script>
</body>

</html>
