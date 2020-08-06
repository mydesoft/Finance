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
          <a href="/user_dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>
        
        
        <li class="treeview">
          <a href="/user_dashboard">
            <i class="fa fa-edit"></i> <span>  Delete Profile Image</span>
           
          </a>
          <ul class="treeview-menu">
            <form method="POST" action = "/delete_ProfileImage/{{auth()->user()->id}}" enctype = "multipart/form-data">
              {{method_field('DELETE')}}
              {{csrf_field()}}
                 <li><i class="fa fa-circle-o"></i><button class="btn btn-google btn-sm">Delete Profile Image</button></li>
            </form>
           
            
          </ul>
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
        User Dashboard
        
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
              <span class="info-box-number"></span>
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

        <div class="container">
             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                Update Password
                              </button>


             <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <!-- /row -->

  <br/>
<hr/>


<div class ="row">
    <div class = "col-md-4">
        <div class = "box box-primary">
            <div class = "box-header">
                <h1 class= "box-title text-info"> My Profile </h1>
            </div>
            

            <div class = "box-body list-group">
                <ul class = "list-group">
                
                       <li class = "list-group-item">Name: {{auth()->user()->name}}</li>
                       <li class = "list-group-item">Email: {{auth()->user()->email}}</li>
                       <li class = "list-group-item">State: {{auth()->user()->state}}</li>
                       <li class = "list-group-item">Gender: {{auth()->user()->gender}}</li>
                       <li class = "list-group-item">Account Type: {{auth()->user()->account_type}}</li>
                        <li class = "list-group-item">Account Number:{{auth()->user()->account_number}}</li>
                                
                 
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

                <form method ="POST" action="/upload_image/{{auth()->user()->id}}" enctype = "multipart/form-data">
                {{csrf_field()}}
                
                    <input type="file" name="profile_picture" placeholder ="select an image" required><br/>
                    <button class="btn btn-primary btn-block"> Upload Image</button>
                </form>
                
            </div>
        </div>
    </div>


    
      
            
    <div class = "col-md-4">
     <button class="btn btn-info btn-lg" data-target="#editprofile" data-toggle="collapse">Edit Profile</button>
    <div id="editprofile" class="collapse">
               <form method = "POST" action = "/profile/{{auth()->user()->id}}">
                {{method_field('PATCH')}}
               {{csrf_field()}}
              
               <br/>
                  <div class ="form-group">
                      <input type = "text" name="name" class = "form-control" placeholder = "Name" value = "{{auth()->user()->name}}">
                  </div>

                  <div class ="form-group">
                      <input type = "email" name="email" class = "form-control" placeholder = "Email" value = "{{auth()->user()->email}}">
                  </div>

                  <div class ="form-group">
                      <input type = "text" name="state" class = "form-control" placeholder = "State" value = "{{auth()->user()->state}}">
                  </div>

                  <div class ="form-group">
                      <input type = "text" name="gender" class = "form-control" placeholder = "gender" value = "{{auth()->user()->gender}}">
                  </div>

                  <div class ="form-group">
                      <input type = "text" name="account_type" class = "form-control" placeholder = "Acoount_Type" value = "{{auth()->user()->account_type}}" disabled>
                  </div>

                   <button class = "btn btn-primary btn-block"> Update</button>
               </form>

                  
            </div>



         
        </div>
    </div>

   



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  








      
    
    
        
    

 </div>     
 @endsection

          

          


