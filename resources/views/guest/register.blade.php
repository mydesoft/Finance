@extends('layouts.master1')

<br/><br/>
@section('content')
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Create Account
				</span>
                            @include('includes.message')
				<form class="login100-form p-b-33 p-t-5"  method="POST" action ="/register">
                              {{ csrf_field() }}

					<div class="form-group">
						<input class="form-control" type="text" name="name" placeholder="Your Full Name" >	
					</div>

                    <hr style = "background-color:red;"/>

                     <div class="form-group ">
                         <select class="form-control" name="gender">
                                <option value="">Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                         </select>	
					</div>
                     <hr style = "background-color:red;"/>

					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="Email">
						
					</div>
                    <hr style = "background-color:red;"/>


                    <div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="Enter Your password Here">
						
					</div>
                     <hr style = "background-color:red;"/>

                    <div class="form-group">
						<input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password">
						
					</div>
                     <hr style = "background-color:red;"/>

                     
                    <div class="form-group">
                         <select class="form-control" name="account_type">
                                <option value="">Account Type</option>
                                <option value="Current">Current</option>
                                <option value="Savings">Savings</option>
                        </select>	
					</div>
                     <hr style = "background-color:red;"/>


                    <div class="form-group">
                         <select class="form-control" name="state">
                                <option value="">Choose Your State</option>
                                <option>Abia</option>
                                <option>Adamawa</option>
                                <option>Lagos</option>
                                <option>Ondo</option>
                                <option>Ekiti</option>
                                <option>Oyo</option>
                                 <option>Osun</option>
                                 <option>Imo</option>
                                 <option>Abuja</option>
                                 <option>Kano</option>
                                 <option>Enugu</option>
                                </select>
					</div>
                     <hr style = "background-color:red;"/>

                   


					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
                            Create
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
@endsection