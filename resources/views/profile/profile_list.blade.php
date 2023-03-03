@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
	<div class="col-lg-8">
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
	<div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('profile.edit', $user) }}" class="btn btn-outline btn-primary"><b>Edit Profile</b></a>
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
  						<h3><strong>{{ Auth::user()->name }}</strong></h3>
  						<p><b>
                            @role('admin') Administrator @endrole
                            @role('user') User @endrole
                            @role('operator') Operator @endrole
                            @role('cashier') Cashier @endrole
                        </b></p>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="col-md-8">
  			<div class="ibox float-e-margins">
  				<div class="ibox-title">
  					<h5>Profile Detail</h5>
  					<div class="ibox-tools">
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

  					<div class="" role="tabpanel" data-example-id="togglable-tabs">
  						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Info</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Edit Profile</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Change Password</a>
                            </li>
  						</ul>
      					<div id="myTabContent" class="tab-content">
      						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
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
          										<td>Full Name</td>
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

      						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
      							<div class="animated fadeInRight">
      								<form action="#" method="post" enctype="multipart/form-data" id="" data-parsley-validate class="form-horizontal form-label-left">

                                        <br>
                                        <div class="form-group">
        									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Full Name</label>
        									<div class="col-md-6 col-sm-6 col-xs-12">
        										<input type="text" name="nama" value="{{ $user->name }}" required="required" class="form-control">
        									</div>
        								</div>

                                        <div class="form-group">
        									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</label>
        									<div class="col-md-6 col-sm-6 col-xs-12">
        										<input type="text" name="username" value="{{ $user->username }}" required="required" class="form-control">
        									</div>
        								</div>

        								<div class="form-group">
        									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email</label>
        									<div class="col-md-6 col-sm-6 col-xs-12">
        										<input type="text" name="email" value="{{ $user->email }}" required="required" class="form-control" disabled>
        									</div>
        								</div>

        								<!--<div class="form-group">
        									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. HP
        									</label>
        									<div class="col-md-6 col-sm-6 col-xs-12">
        										<input type="text" name="" value="" required="required" class="form-control">
        									</div>
        								</div>-->

        								<div class="form-group">
        									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo</label>
        									<div class="col-md-6 col-sm-6 col-xs-12">
        										<input type="file" name="filefoto" class="form-control">
        										<!-- file gambar kita buat pada field hidden -->
        										<input type="hidden" name="filelama" class="form-control" value="">
        										<!-- Id gambar kita hidden pada input field dimana berfungsi sebagai identitas yang dibawa untuk update -->
        										<input type="hidden" name="kode" class="form-control" value="">
        										<p>Kosongkan bila fle foto tidak diubah</p>
                                            </div>
        								</div>

        								<div class="form-group">
        									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        									  <button type="submit" class="btn btn-outline btn-primary" value=""><b>Save</b></button>
        									</div>
        								</div>

      								</form>
      							</div>
      						</div>

      						<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
      							<div class="animated fadeInRight">

                                    {{-- PESAN ALERTS --}}
                                    @include('layouts/alert')

                                    {{-- <form action="" method="post" enctype="multipart/form-data" id="" data-parsley-validate class="form-horizontal form-label-left"> --}}

									<form action="{{route('profile.update', $user)}}" method="post" class="form-horizontal form-label-left">

                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <br>
                                        <div class="form-group">
              								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Name</label>
              								<div class="col-md-6 col-sm-6 col-xs-12">
              								  <input type="name" id="name" name="name" value="{{ $user->name }}" required="required" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
											  <p>
				                                @if ($errors->has('name'))
				                                  <div class="alert alert-danger alert-dismissable">
				        								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				        								{{ $errors->first('name') }}<a class="alert-link"></a>.
				        							</div>
				                                @endif
				                              </p>
											</div>
              							</div>

										<div class="form-group">
              								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email</label>
              								<div class="col-md-6 col-sm-6 col-xs-12">
              								  <input type="email" id="email" name="email" value="{{ $user->email }}" required="required" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" >
											  <p>
				                                @if ($errors->has('email'))
				                                  <div class="alert alert-danger alert-dismissable">
				        								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				        								{{ $errors->first('email') }}<a class="alert-link"></a>.
				        							</div>
				                                @endif
				                              </p>
											</div>
              							</div>

              							{{-- <div class="form-group">
              								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Password
              								</label>
              								<div class="col-md-6 col-sm-6 col-xs-12">
              								  <input type="password" id="current-password" name="current_password" value="" required="required" class="form-control {{ $errors->has('current_password') ? 'is-invalid':'' }}">
											  <p>
				                                @if ($errors->has('current_password'))
				                                  <div class="alert alert-danger alert-dismissable">
				        								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				        								{{ $errors->first('current_password') }}<a class="alert-link"></a>.
				        							</div>
				                                @endif
				                              </p>
              								</div>
              							</div> --}}

              							<div class="form-group">
              								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password</label>
              								<div class="col-md-6 col-sm-6 col-xs-12">
              								  <input type="password" id="password" name="password" value="" required="required" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
											  <p>
				                                @if ($errors->has('password'))
				                                  <div class="alert alert-danger alert-dismissable">
				        								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				        								{{ $errors->first('password') }}<a class="alert-link"></a>.
				        							</div>
				                                @endif
				                              </p>
              								</div>
              							</div>

              							<div class="form-group">
              								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password</label>
              								<div class="col-md-6 col-sm-6 col-xs-12">
              								  <input type="password" id="password_confirmation" name="password_confirmation" value="" required="required" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}">
              								</div>
											<p>
											  @if ($errors->has('password_confirmation'))
												<div class="alert alert-danger alert-dismissable">
													  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
													  {{ $errors->first('password_confirmation') }}<a class="alert-link"></a>.
												  </div>
											  @endif
											</p>
              							</div>

              							<br>

              							<div class="form-group">
              								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              								  <button type="submit" class="btn btn-outline btn-primary" value=""><b>Save</b></button>
              								</div>
              							</div>

			                       </form>

      							</div>
      						</div>

      					</div>

		                 <hr style="clear:both;"/>

  					</div>

  				</div>
  			</div>
  		</div>

	</div>
</div>
@endsection
