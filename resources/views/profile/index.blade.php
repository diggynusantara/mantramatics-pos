@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
	<div class="col-lg-7">
		<h2>Profile Info</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/home">Home</a>
			</li>
			<li class="active">
				<strong>Profile</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-5">
        <div class="title-action">
            <a href="{{ route('profile.edit', $user) }}" class="btn btn-outline btn-primary"><b>Edit Profile</b></a>
			<a href="{{ route('profile.editpassword', $user) }}" class="btn btn-outline btn-warning"><b>Change Password</b></a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">

  		<div class="col-md-4">
  			<div class="ibox float-e-margins">
  				<div class="ibox-title">
  					<h5>Photo Profile</h5>
                    <div class="ibox-tools">
  						<a class="collapse-link">
  							<i class="fa fa-chevron-up"></i>
  						</a>
  						<a class="close-link">
  							<i class="fa fa-times"></i>
  						</a>
  					</div>
  				</div>
  				<div>
  					<div class="ibox-content no-padding border-left-right">
      					<center>
	                        {{-- <img alt="image" class="img-responsive" src="gambar_coba/secky.JPG"> --}}
                            {{-- @if (!empty( Auth::user()->photo ))
                            <img src="{{ asset('uploads/users/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="img-responsive">
                            @else
                            <img src="http://via.placeholder.com" alt="&nbsp; No Data Photo">
                            @endif --}}
                            @if (!empty( $user->photo ))
                            <img src="{{ asset('uploads/users/' . $user->photo) }}" alt="{{ $user->name }}" class="img-responsive">
                            @else
                            <img src="http://via.placeholder.com" alt="&nbsp; No Data Photo">
                            @endif
      					</center>
  					</div>
  					<div class="ibox-content profile-content">
						<center>
							<h3><strong>{{ Auth::user()->name }}</strong></h3>
								<p><b>
		                        @role('admin') Administrator @endrole
		                        @role('user') User @endrole
		                        @role('operator') Operator @endrole
		                        @role('cashier') Cashier @endrole
		                    </b></p>
						</center>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="col-md-8">
  			<div class="ibox float-e-margins">
  				<div class="ibox-title">
  					<h5>Profile Detail</h5>
					<div class="ibox-tools">
						{{-- <a href="{{ route('profile.edit', $user) }}"><button class="btn btn-xs btn-outline btn-primary"><b>Edit Profile</b></button></a>
						<a href="{{ route('profile.editpassword', $user) }}"><button class="btn btn-xs btn-outline btn-warning"><b>Change Password</b></button></a> --}}

  						<a class="collapse-link">
  							<i class="fa fa-chevron-up"></i>
  						</a>
  						<a class="close-link">
  							<i class="fa fa-times"></i>
  						</a>
  					</div>
  				</div>

  				<div class="ibox-content">

					{{-- PESAN ALERTS --}}
					@include('layouts/alert')

					<div class="animated fadeInRight">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width:100px">&nbsp;</th>
									<th style="width:10px">&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
                            	<tr>
									<td>Name</td>
									<td>:</td>
									{{-- <td>{{ Auth::user()->name }}</td> --}}
                                	<td>{{ $user->name }}</td>
								</tr>
                            	<tr>
									<td>Username</td>
									<td>:</td>
									<td>{{ $user->username }}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td>{{ $user->email }}</td>
								</tr>
	                            <tr>
									<td>Role</td>
									<td>:</td>
									<td>
	                                    @role('admin') Administrator @endrole
	                                    @role('user') User @endrole
	                                    @role('operator') Operator @endrole
	                                    @role('cashier') Cashier @endrole
	                                </td>
	                        	</tr>
							</tbody>
						</table>
					</div>

  				</div>
  			</div>
  		</div>

	</div>
</div>
@endsection
