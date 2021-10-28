<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/dms_images/pup.ico" />
    @yield('css')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
     <style>
            .navbar-badge {
            font-size: .6rem;
            font-weight: 300;
            padding: 2px 4px;
            position: absolute;
            right: 5px;
            top: 9px;
        }

       /* .badge-warning {
            color: #1f2d3d;
            background-color: #ffc107;
        }*/

        
        .navbar-expand .navbar-nav .nav-link {
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .dropdown-footer, .dropdown-header {
            display: block;
            font-size: .875rem;
            /*padding: .5rem 1rem;*/
            text-align: center;
        }

        .dropdown-item {
            
            width: 100%;
            
            clear: both;
            font-weight: 400;
            
           
            
            background-color: transparent;
            border: 0;
        }

        .dropdown-header {
            display: block;
            padding: .5rem 1rem;
            margin-bottom: 0;
            font-size: .875rem;
            color: #6c757d;
            white-space: nowrap;
        }

        .dropdown-menu-lg .dropdown-item {
            padding: .5rem 1rem;
            
        }

        .dropdown-menu-lg {
            max-width: 500px;
            min-width: 500px;
            max-height: 300px;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0;
        }
        .dropdown-menu-pota{
            
        }
        
       

        .dropdown-menu.show {
        display: block;
        }

       .text-muted {
            /*color: #fff !important; margin-top: -450px;*/
        }

       /*Scroll bar notifictions design*/
       ::-webkit-scrollbar {
         width: 5px;
       }

       ::-webkit-scrollbar-track {
          background: #f1f1f1;
          border-radius: 10px;
        }
 
        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #888;
          border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: #555; 
        }



       /* .dropdown-menu-pota:before {
            content: "";
            position: absolute;
            top: -30px;
            left: 93%;
            transform: translateX(-50%);
            border: 15px solid;
            border-color: transparent transparent #fff transparent;
        }*/

       .circle{
      /*background-color: red;*/
      border-radius: 50px;
      /*height: -10px;*/
      width: 40px;
      }

       .circle:hover{
      background-color: #d1d1d1;
       transition: all 0.5s ease;
 

background-position: left bottom;
  }
     </style>

    <script>
        $(document).ready(function () {
        $(document).on('click.bs.dropdown.data-api', '.dropdown-menu-lg', function (e) {
  e.stopPropagation();
        });

            $(document).on('click.bs.dropdown.data-api', '.dropdown-menu-pota', function (e) {
  e.stopPropagation();
        });
            });
    </script>
</head>
<body class="sidebar-mini" style="height: auto;" >
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
           <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                {{--<li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>--}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               @can('see notification')
               <!-- Notifications Dropdown Menu -->
                  <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="fas fa-bell fa-lg"></i>
                        @if(auth()->user()->unreadnotifications->count())
                      <span class="badge badge-danger navbar-badge">{{auth()->user()->unreadnotifications->count()}}</span>
                        @endif
                    </a>
                    
                      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
 
                     @if(auth()->user()->unreadnotifications->count())
                        <span class="dropdown-item dropdown-header" style="font-size: 20px;">{{auth()->user()->unreadnotifications->count()}} New Notification/s</span>
                          <div class="dropdown-divider"></div>
                      <div class="form-group row" style="margin-bottom: -15px;">
                          <div class="form-group col-md-6">
                              <a href="#" class="dropdown-item dropdown-footer" style="color:cornflowerblue;"><i class="fas fa-list"></i> See All Notifications</a>
                          </div>
                          <div class="form-group col-md-6">
                              <a href="{{route('markAsRead')}}" class="dropdown-item dropdown-footer" style="color: forestgreen;"><i class="fas fa-check"></i> Mark all as read</a>
                          </div>
                      </div>
                          @else
                        <span class="dropdown-item dropdown-header" style=" font-size: 20px;">Notifications</span>
                          <div class="dropdown-divider"></div>
                      <div class="form-group row" style="margin-bottom: -15px;">
                          <div class="form-group col-md-6">
                              <a href="#" class="dropdown-item dropdown-footer" style="color:cornflowerblue;"><i class="fas fa-list"></i> See All Notifications</a>
                          </div>
                          <div class="form-group col-md-6">
                              <a href="{{route('markAsRead')}}" class="dropdown-item dropdown-footer" style="color: forestgreen;"><i class="fas fa-check"></i> Mark all as read</a>
                          </div>
                      </div>
                          <!-- Example split danger button -->
                       
                      @endif
                    <!--<a class="nav-link circle" data-toggle="dropdown" href="#" style="margin-top: -40px; margin-left: 320px">
                          <i class="fas fa-ellipsis-h fa-lg" style="margin-left: -5px; margin-top: 5px;"></i>
                                </a>
                        
                           @if(auth()->user()->unreadnotifications->count() == 6)
                          <div class="dropdown-menu dropdown-menu-pota" style="margin-top: -192px; margin-left: 178px;">
                            <a class="dropdown-item" href="{{route('markAsRead')}}"><i class="fas fa-check"></i> Mark all as read</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> See All Notifications</a>
                          </div>
                          
                          @else
                             <div class="dropdown-menu dropdown-menu-pota" style="margin-top: -250px; margin-left: 178px;">
                            <a class="dropdown-item" href="{{route('markAsRead')}}"><i class="fas fa-check"></i> Mark all as read</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> See All Notifications</a>
                          </div>
                          @endif-->

                        @foreach(auth()->user()->unreadNotifications as $notification)
                          @if($notification->type == 'App\Notifications\AppointmentTodayNotification')
                                <div class="dropdown-divider"></div>
                              <a href="/todays-appointments" class="dropdown-item bg-info" >
                                <i class="fas fa-envelope mr-2"></i>{{$notification->data['appointment']}}
                                <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                              </a>
                          @elseif($notification->type == 'App\Notifications\AppointmentTomorrowNotification')
                                <div class="dropdown-divider"></div>
                               <a href="/tomorrows-appointments" class="dropdown-item bg-info" >
                                <i class="fas fa-envelope mr-2"></i>{{$notification->data['appointment']}}
                                <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                              </a>
                         @elseif($notification->type == 'App\Notifications\ExpiredMedicineNotification')
                                <div class="dropdown-divider"></div>
                               <a href="/all-medicine" class="dropdown-item bg-info" >
                                <i class="fas fa-envelope mr-2"></i>{{$notification->data['expired_medicine']}}
                                <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                              </a>
                          @endif
                       @endforeach
                        @foreach(auth()->user()->readNotifications as $notification)
                          @if($notification->type == 'App\Notifications\AppointmentTodayNotification')
                        <div class="dropdown-divider"></div>
                      <a href="/todays-appointment" class="dropdown-item">
                        <i class="fas fa-envelope-open mr-2"></i>{{$notification->data['appointment']}}
                        <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                      </a>
                          @elseif($notification->type == 'App\Notifications\AppointmentTomorrowNotification')
                       <div class="dropdown-divider"></div>
                      <a href="/tomorrows-appointments" class="dropdown-item">
                        <i class="fas fa-envelope-open mr-2"></i>{{$notification->data['appointment']}}
                        <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                      </a>
                       @elseif($notification->type == 'App\Notifications\ExpiredMedicineNotification')
                                <div class="dropdown-divider"></div>
                               <a href="/all-medicine" class="dropdown-item bg-info" >
                                <i class="fas fa-envelope-open mr-2"></i>{{$notification->data['expired_medicine']}}
                                <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                              </a>
                          @endif
                       @endforeach
                       
                      <!--<div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                      </a>
                      <div class="dropdown-divider"></div>  @for ($x = 0; $x <= 20; $x++)

                                 <div class="dropdown-divider"></div>
                      <div class="form-group row" style="margin-bottom:-15px;">
                          <div class="form-group col-md-6">
                              <a href="#" class="dropdown-item dropdown-footer"><i class="fas fa-list"></i> See All Notifications</a>
                          </div>
                          <div class="form-group col-md-6">
                              <a href="{{route('markAsRead')}}" class="dropdown-item dropdown-footer"><i class="fas fa-check"></i> Mark all as read</a>
                          </div>
                      </div>
                          @endfor-->
                       
                   
                
      
                       
                    </div>
                    
                  </li>
             <!--End of Notification-->
                @endcan
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <p>
                            <i class="nav-icon fas fa-power-off"></i>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary bg-dark elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
               {{-- <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <div class="text-center" style="background-color:grey;">
                    @foreach($homes as $home)
                <image class="profile-img" src="{{asset('images')}}/{{$home->logo}}" style="width: 70%"></image>
                    @endforeach
                </div>
                <!--<span class="brand-text font-weight-light">AdminLTE 3</span>-->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img') }}/{{auth()->user()->photo}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!--Dashboard-->
                       @can('show dashboard')
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-chalkboard"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                       @endcan

                         <li class="nav-item">
                            <a href="/calendar" class="nav-link {{Request::is('calendar') ? 'active' : ''}}">
                                <i class="fas fa-calendar nav-icon"></i>
                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                        
                       
                        <!--Notifications-->
                        @can('receive notif')
                         <li class="nav-item">
                            <a href="#" class="nav-link ">
                            <i class="fas fa-bell nav-icon"></i>
                            <p>Notifications</p>
                            </a>
                        </li>
                        @endcan
                        {{--@can('create appointments')--}}
                        <!--<li class="nav-item">
                            <a href="/appointments" class="nav-link {{Request::is('appointments') ? 'active' : ''}}">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Appointments</p>
                            </a>
                        </li>-->
                        {{--@endcan--}}
                       
                        <!--Patient Management-->
                        @can('manage patient')
                        <li class="nav-item">
                            <a href="/all-patient" class="nav-link {{Request::is('all-patient') ? 'active' : ''}}">
                            <i class="fas fa-id-card-alt nav-icon"></i>
                            <p>Dental Patients</p>
                            </a>
                        </li>
                        <!--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>
                                    Dental Patients
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                           <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/all-patient" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>
                                            List of Patients
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        @endcan
                         <!--Services Management-->
                        @can('manage services')
                        <li class="nav-item">
                            <a href="/all-service" class="nav-link {{Request::is('all-service') ? 'active' : ''}}">
                            <i class="fas fa-hand-holding-medical nav-icon"></i>
                            <p>Dental Services</p>
                            </a>
                        </li>
                       <!--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-hand-holding-medical"></i>
                                <p>
                                    Dental Services
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/all-service" class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            List of Services
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        @endcan

                         <!--Medicines Management-->
                        @can('manage medicines')
                        <li class="nav-item">
                            <a href="/all-medicine" class="nav-link {{Request::is('all-medicine') ? 'active' : ''}}">
                            <i class="fas fa-pills nav-icon"></i>
                            <p>Dental Medicines</p>
                            </a>
                        </li>
                        <!--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-pills"></i>
                                <p>
                                    Dental Medicines
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/all-medicine" class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            List of Medicines
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        @endcan
                        
                         <!--Supply Management-->
                        @can('manage supply')
                        <li class="nav-item">
                            <a href="/all-supply" class="nav-link {{Request::is('all-supply') ? 'active' : ''}}">
                            <i class="fas fa-boxes nav-icon"></i>
                            <p>Dental Supplies</p>
                            </a>
                        </li>
                        <!--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Dental Supplies
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/all-supply" class="nav-link">
                                        <i class="nav-icon fas fa-list-ul"></i>
                                        <p>
                                            List of Supplies
                                        </p>
                                    </a>
                                
                                    
                                </li>
                            </ul>
                        </li>-->
                        @endcan
                         <!--Appointments-->
                       
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                               <i class="fas fa-calendar-check nav-icon"></i>
                                <p>
                                    Appointments
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 13px;">
                               
                                    <li class="nav-item">
                                        <a href="/appointments" class="nav-link {{Request::is('appointments') ? 'active' : ''}}">
                                            <i class="fas fa-clipboard-list nav-icon"></i>
                                            <p style="padding-left: 10px;">Appointment List</p>
                                        </a>
                                    </li>
                                 
                               
                                    <li class="nav-item">
                                        <a href="/todays-appointments" class="nav-link  {{Request::is('todays-appointments') ? 'active' : ''}}">
                                            <i class="fas fa-calendar-day nav-icon"></i>
                                            <p style="padding-left: 10px;">Today's Appt.</p>
                                        </a>
                                    </li>
                               
                                <li class="nav-item">
                                    <a href="/tomorrows-appointments" class="nav-link  {{Request::is('tomorrows-appointments') ? 'active' : ''}}">
                                        <i class="fas fa-calendar-plus nav-icon"></i>
                                        <p style="padding-left: 10px;">Tomorrow's Appt.</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                   
                         <!--User Management-->
                        @can('manage users')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    User Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 13px;">
                                @can('create role')
                                    <li class="nav-item">
                                        <a href="{{ route('role.index') }}" class="nav-link  {{Request::is('role') ? 'active' : ''}}">
                                            <i class="fas fa-user-tag nav-icon"></i>
                                            <p style="padding-left: 10px;">Roles</p>
                                        </a>
                                    </li>
                                 @endcan
                                @can('create permission')
                                    <li class="nav-item">
                                        <a href="{{ route('permission.index') }}" class="nav-link  {{Request::is('permission') ? 'active' : ''}}">
                                            <i class="fas fa-user-shield nav-icon"></i>
                                            <p style="padding-left: 10px;">Permissions</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('create user')
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link  {{Request::is('user') ? 'active' : ''}}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p style="padding-left: 10px;">Users</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan 
                    <!--Account Management-->
                        @can('manage account')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Account Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 13px;">
                                <li class="nav-item">
                                    <a href="{{ route('user.profile') }}" class="nav-link  {{Request::is('profile') ? 'active' : ''}}">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p style="padding-left: 10px;">Profile</p>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="/change-profile-picture/{{auth()->user()->id}}" class="nav-link">
                                    <i class="fas fa-image nav-icon"></i>
                                    <p style="padding-left: 10px;">Change Profile Photo</p>
                                    </a>
                                  </li>

                                 <li class="nav-item">
                                    <a href="{{ route('userGetPassword') }}" class="nav-link {{Request::is('password/change') ? 'active' : ''}}">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p style="padding-left: 10px;">Change Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                         <!--Reports-->
                       {{--@can('print reports')--}}
                        <!--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/appointment-report" class="nav-link">
                                        <i class="nav-icon fas fa-file-pdf"></i>
                                        <p>
                                            Appointments
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/patient-report" class="nav-link">
                                        <i class="nav-icon fas fa-file-pdf"></i>
                                        <p>
                                            Patients
                                        </p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="/medicine-report" class="nav-link">
                                        <i class="nav-icon fas fa-file-pdf"></i>
                                        <p>
                                            Medicines
                                        </p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="/supply-report" class="nav-link">
                                        <i class="nav-icon fas fa-file-pdf"></i>
                                        <p>
                                             Supplies
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        {{--@endcan--}}
                        @can('manage website')
                         <!--Site Settings-->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                     Website Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="padding-left: 13px;">
                                <li class="nav-item">
                                    <a href="/edit-home/1" class="nav-link {{Request::is('edit-home/1') ? 'active' : ''}}">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p style="padding-left: 10px;">Home</p>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="/edit-about/1" class="nav-link {{Request::is('edit-about/1') ? 'active' : ''}}">
                                    <i class="fas fa-info-circle nav-icon"></i>
                                    <p style="padding-left:10px;">About</p>
                                    </a>
                                  </li>

                                 <li class="nav-item">
                                    <a href="/edit-service/1" class="nav-link {{Request::is('edit-service/1') ? 'active' : ''}}">
                                    <i class="fas fa-hand-holding-heart nav-icon"></i>
                                    <p style="padding-left:10px;">Service</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/edit-dentist/1" class="nav-link {{Request::is('edit-dentist/1') ? 'active' : ''}}">
                                    <i class="fas fa-user-md nav-icon"></i>
                                    <p style="padding-left: 10px;">Dentist</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/edit-announcement/1" class="nav-link {{Request::is('edit-announcement/1') ? 'active' : ''}}">
                                    <i class="fas fa-bullhorn nav-icon"></i>
                                    <p style="padding-left: 10px;">Announcement</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href=""
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 399px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @include('partials.alert')     
                    @yield('content')
   
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            {{--<div class="float-right d-none d-sm-inline">
                Anything you want
            </div>--}}
            <!-- Default to the left -->
            <marquee behavior="alternate">
            <strong>Copyright © 2020-2021 <a href="">Techies Developers</a> </strong> All rights reserved.
            </marquee>
        </footer>
        <div id="sidebar-overlay"></div>
    </div>
    @yield('js')
    @stack('scripts')
    @stack('css')
    
    </body>
</html>

