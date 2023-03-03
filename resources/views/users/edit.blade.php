@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Edit Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="{!! route('users.index') !!}">Users Manajement</a>
            </li>
            <li class="active">
                <strong>Edit Users</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('users.index') }}" class="btn btn-outline btn-primary"><b>Back to Users List</b></a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Form Edit Users</h5>
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

                <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}                                 {{-- SAMA AJA --}}
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}  {{-- SAMA AJA --}}

                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $user->name }}" required>
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

                    <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
                          <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}" value="{{ $user->username }}" required>
                          <p>
                            @if ($errors->has('username'))
                              <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $errors->first('username') }}<a class="alert-link"></a>.
                              </div>
                            @endif
                          </p>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $user->email }}" required readonly>
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

                    <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-8">
                          <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" value="">
                          <p>
                            @if ($errors->has('password'))
                              <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $errors->first('password') }}<a class="alert-link"></a>.
                              </div>
                            @endif
                          </p>
                          <p class="text-warning">Leave it blank, if you don't want to change the password</p>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-8">
                          <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid':'' }}" required>
                              <option value="1">Active</option>
                              <option value="0">Suspend</option>
                          </select>
                          <p>
                            @if ($errors->has('status'))
                              <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $errors->first('status') }}<a class="alert-link"></a>.
                              </div>
                            @endif
                          </p>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-8">
                          <input type="file" name="photo" class="form-control">
                          <p>
                            @if ($errors->has('photo'))
                              <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $errors->first('photo') }}<a class="alert-link"></a>.
                              </div>
                            @endif
                          </p>
                          @if (!empty($user->photo))
                              <img src="{{ asset('uploads/users/' . $user->photo) }}" alt="{{ $user->name }}" width="150px" height="150px">
                          @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-outline btn-primary" type="submit"><b>Save</b></button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
</div>
@endsection
