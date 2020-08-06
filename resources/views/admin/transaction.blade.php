@extends('layouts.master')

@section('title', 'Admin Dashboard')
@section('content')
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Myde</b>Soft</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img class ="img-rounded" width="20" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <img class ="img-rounded" width="20" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">

                <p>
                  {{auth()->user()->name}}
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                 <form method ="POST" action = "/signout">
                  {{csrf_field()}}
                  <button class="btn btn-default btn-flat">Sign out</button>
                  </form>
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
      <div class="user-panel">
        <div class="pull-left image">
         <img class ="img-rounded" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="/admin_dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>
        
        
        <li >
          <a href="/admin_dashboard">
            <i class="fa fa-laptop"></i>
            <span>Update Profile Picture</span>
          </a>
        </li>

         <li>
          <a href="/all_users">
            <i class="fa fa-user"></i>
            <span>View All Users</span>
          </a>
        </li>

        

          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Admins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="/all_admin"><i class="fa fa-circle-o"></i> View All Admin</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Transaction History</span>
          </a>
        </li>
     
      <li class="treeview">
        <form method ="POST" action = "/signout">
        {{csrf_field()}}
          
            <i class="fa fa-sign-out" style="color:red;"> </i>
            <span><button class="btn btn-danger btn-sm">Sign Out</button></span>
            {{-- <span>Sign Out</span> --}}
          
          </form>
        </li>
       
        <li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Welcome Back Admin
        
      </h1>
      @include('includes.message')
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
       
        <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registered Users</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Administrators</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



          <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Amount Credited</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

       

      
      </div>
      <!-- /.row -->


<div class = "col-md-12">
        <div class = "box box-primary">
            <div class = "box-header">
                <h1 class= "box-title text-bold"> User Transaction </h1>
            </div>
            

            <div class = "box-body">
            <div class = "table-responsive">
                <table class= "table table-striped table-hover table-bordered">
                        <tr>
                            
                            <th> Transfer To</th>
                            <th> Account Name </th>
                            <th>Account Number </th>
                            <th> Amount </th>
                            <th> Balance</th>
                            <th> All Deposit </th>
                            <th> Time </th>
                        </tr>

                     
                        
                            @foreach ($transfers as $transfer)
                                @if($user->id == $transfer->user_id)
                                <tr>
                                    <td> {{$transfer->recipient_account_name}}</td>
                                     <td> {{$transfer->recipient_account_number}}</td>
                                     <td> {{$transfer->recipient_bank}}</td>
                                      <td> {{$transfer->amount}}</td>
                                      <td>{{$user->balance}}</td>
                                      
                                      <td></td>
                                      <td> {{$transfer->created_at->isoFormat('LLLL')}}</td>
                                      
                               </tr>
                             
                              
                                @endif
                                
                                
                            @endforeach
                            
                           
                             
                            
                           
                          
                            
                      
    </table>
            </div>
        </div>
    </div>
    </div>


     
      
        

      </div>
      <!-- /.row -->


      

      
 @endsection

          

          


