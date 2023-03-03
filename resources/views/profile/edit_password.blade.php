@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Change Password</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('profile.index') }}">Profile</a>
            </li>
            <li class="active">
                <strong>Change Password</strong>
            </li>
        </ol>
    </div>
    {{-- <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('users.create') }}" class="btn btn-outline btn-primary"><b>Add New Users</b></a>
        </div>
    </div> --}}
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Form Change Profile</h5>
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

                <form action="{{route('profile.updatepassword', $user)}}" method="post" class="form-horizontal form-label-left">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <br>
                    {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="username" name="username" value="{{ $user->username }}" required="required" class="form-control" disabled>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="old_password" value="" required="required" class="form-control {{ $errors->has('old_password') ? 'is-invalid':'' }}">
                          <p>
                            @if ($errors->has('old_password'))
                              <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ $errors->first('old_password') }}<a class="alert-link"></a>.
                                </div>
                            @endif
                          </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="new_password" value="" required="required" class="form-control {{ $errors->has('new_password') ? 'is-invalid':'' }}">
                          <p>
                            @if ($errors->has('new_password'))
                              <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ $errors->first('new_password') }}<a class="alert-link"></a>.
                                </div>
                            @endif
                          </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="confirm_password" value="" required="required" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid':'' }}">
                          <p>
                            @if ($errors->has('confirm_password'))
                              <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ $errors->first('confirm_password') }}<a class="alert-link"></a>.
                                </div>
                            @endif
                          </p>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-outline btn-primary" value=""><b>Save</b></button>
                          <a href="{{ route('profile.index') }}" class="btn btn-outline btn-warning"><b>Cancel</b></a>
                        </div>
                    </div>

               </form>

            </div>
        </div>
    </div>

</div>
</div>
@endsection
