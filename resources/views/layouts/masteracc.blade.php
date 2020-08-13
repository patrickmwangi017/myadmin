<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> -->
                    <!-- @if (Auth::guest())

                    @else 
                                <a href="#" class="navbar-brand" >
                                  You are logged in as:  {{ Auth::user()->name }} 
                                </a>
                                @endif -->
                     </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li> <a href="{{ route('user.signup')}}">Customer Sign Up</a></li>
                            <li> <a href="{{ route('user.signin')}}">Sign In as Customer</a></li>
                            <li> <a href="{{ route('drivers.login')}}">Sign In as Driver</a></li>
                            <li> <a href="{{ route('accountants.login')}}">Sign In as Accountant</a></li>
                            <li> <a href="{{ route('masons.login')}}">Sign In as Mason</a></li>
                        @else   
                        <a href="#" class="navbar-brand" >
                                  You are logged in as:  {{ Auth::user()->name }} 
                                </a>
                                <li> <a href="{{ route('accountants.profile')}}">My Profile</a></li>
                                <li> <a href="{{ route('accountants.login')}}">All Payments</a></li>
                                <li> <a href="{{ route('accountants/pending')}}">Pending Payments</a></li>
                                <li> <a href="{{ route('accountants/approved')}}">Approved Payments</a></li>
                                <!-- <li> <a href="{{ route('accountants/archived')}}">Archived Payments</a></li> -->
                                <li> <a href="{{ route('accountants/rejected')}}">Rejected Payments</a></li>
                                <li> <a href="{{ route('accountants/refunded')}}">Refunded Payments</a></li>
                                <li> <a href="{{ route('accountants.logout')}}">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
