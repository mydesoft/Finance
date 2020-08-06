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
        <li>
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
            <li><a href="" data-toggle="modal" data-target="#createadmin"><i class="fa fa-circle-o"></i> Create New Admin</a></li>
            <li><a href="/all_admin"><i class="fa fa-circle-o"></i> View All Admin</a></li>
            
          </ul>
        </li>

        <li>
          <a href="/all_transaction">
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

          <div class="container">
             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#password">
                                Update Password
                              </button>


             <!-- Modal -->
                              <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Change Your Password Here</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="/update_password/{{auth()->user()->id}}">
                                       
                                        {{ csrf_field() }}
                                            {{method_field('PATCH')}}

                                             {{-- <div class = "form-group">
                                              <label> Old Password</label>
                                              <input type="password" name = "old_password" class="form-control" value="">
                                          </div> --}}
                                          <div class = "form-group">
                                              <label> New Password</label>
                                              <input type="password" name = "password" class="form-control" value="">
                                          </div>

                                          <div class = "form-group">
                                              <label> Confirm Password</label>
                                              <input type="password" name = "password_confirmation" class="form-control">
                                          </div>

                                          <button class = "btn btn-primary">Update</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>

      
      </div>
      <!-- /.row -->


     
      
        <div class ="row">
    <div class = "col-md-6">
        <div class = "box box-primary">
            <div class = "box-header">
                <h1 class= "box-title text-info"> My Profile </h1>
            </div>
            

            <div class = "box-body list-group">
                <ul class = "list-group">
                         <li class = "list-group-item">Role : Admin</li>
                       <li class = "list-group-item">Name: {{auth()->user()->name}}</li>
                       <li class = "list-group-item">Email: {{auth()->user()->email}}</li>
                     
                                
                 
                </ul>
            </div>
        </div>
    </div>


    <div class = "col-md-4">
        <div class = "box box-success">
            <div class = "box-header">
                <h1 class= "box-title text-info"> Put a Profile Image </h1>
                 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            

            <div class = "box-body">

                <form method ="POST" action="/upload_admin_image/{{auth()->user()->id}}" enctype = "multipart/form-data">
                {{-- {{method('PATCH')}} --}}
                {{csrf_field()}}
                
                    <input type="file" name="profile_picture" placeholder ="select an image" required><br/>
                    <button class="btn btn-primary btn-block"> Upload Image</button>
                </form>
                
            </div>
        </div>
    </div>
</div>




             <!-- Modal -->
                              <div class="modal fade" id="createadmin" tabindex="-1" role="dialog" aria-labelledby="createadmniLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="createadmniLabel">Create New Admin Here</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="/createadmin">
                                       
                                        {{ csrf_field() }}
                                            

                                             
                                          <div class = "form-group">
                                              <label> Name</label>
                                              <input type="text" name = "name" class="form-control" value="">
                                          </div>

                                          <div class = "form-group">
                                              <label> Email</label>
                                              <input type="email" name = "email" class="form-control" value="">
                                          </div>

                                          <div class = "form-group">
                                              <label> Password</label>
                                              <input type="password" name = "password" class="form-control">
                                          </div>

                                          <div class = "form-group">
                                              <label> Confirm Password</label>
                                              <input type="password" name = "password_confirmation" class="form-control">
                                          </div>

                                          <button class = "btn btn-primary">Create Admin</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                          
      </div>
      
      <!-- /.row -->


      

      
 @endsection

          

          


