@extends('layouts.master')

@section('title', 'User Dashboard')
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
              <img class ="img-circle" width="20" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img class ="img-circle" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">

                <p>
                 {{auth()->user()->name}}
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                 <form method ="POST" action = "/logout">
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
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> --}}
           <img class ="img-circle" src = "storage/profile_picture/{{auth()->user()->profile_picture}}">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
         
            <i class="fa fa-dashboard"></i> <span> <a href="/user_dashboard">Dashboard </a></span>
            
          
         
        </li>
        
        
        <li>
          <a href="/user_dashboard">
            <i class="fa fa-circle-o"></i>
            <span>Update Profile Picture</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Edit Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/user_dashboard"><i class="fa fa-circle-o"></i> Update Profile</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Banking Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/online_transfer"><i class="fa fa-circle-o"></i> Online Transfer</a></li>
            <li><a href="/online_transfer"><i class="fa fa-circle-o"></i> Get Transfer Pin</a></li>
            <li><a href="/account_history"><i class="fa fa-circle-o"></i> Account History</a></li>
          </ul>
        </li>
     
        
        <li class="treeview">
        <form method ="POST" action = "/logout">
        {{csrf_field()}}
          
            <i class="fa fa-sign-out" style="color:red;"> </i>
            <span><button class="btn btn-danger">Sign Out</button></span>
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
        User Dashboard
        
      </h1>

      
      <ol class="breadcrumb">
        <li><a href="/user_dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Account Balance</span>
              <span class="info-box-number">{{auth()->user()->balance}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Deposits</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Withdrawal</span>
              
                  <span class="info-box-number">{{auth()->user()->withdrawal}}</span>
               
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

     
      </div>
      <!-- /row -->




<div class ="row">
    <div class = "col-md-12">
      

        <div class = "card">
            <div class="card-header">
                <h4>Transaction History</h4>
            </div>
            <div class="card-body">
           
                    <table class = "table table-responsive">
                        <tr>
                            <th>Transfer To</th>
                            <th>Account Number</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Time</th>
                        </tr>

                         @if(count($transfers) > 0)
                         @foreach ($transfers as $transfer)
                         <tr>
                             @if(auth()->user()->id == $transfer->user_id) 
                            <td>{{$transfer->recipient_account_name}}</td>
                            <td>{{$transfer->recipient_account_number}}</td>
                            <td>{{$transfer->recipient_bank}}</td>
                            <td>{{$transfer->amount}}</td>
                            <td>{{$transfer->created_at->isoFormat('LLLL')}}</td>
                            @endif
                        </tr>
                        @endforeach

                        
                           
                        @endif

                        
                
                       

                     </table>

                    
                     
                     
       
                
            
        </div>
    
      
            
   
        </div> 
        </div>
    </div>

   



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  








      
    
    
        
    

 </div>     
 @endsection

          

          


