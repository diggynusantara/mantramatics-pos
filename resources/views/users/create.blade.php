@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Create New Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
            </li>
            <li>
                <a href="{!! route('users.index') !!}">Users Manajement</a>
            </li>
            <li class="active">
                <strong>Create New Users</strong>
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
              <h5>Form Create New Users</h5>
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

                <form action="{{ route('users.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                      {{ csrf_field() }}

                      <div class="form-group"><label class="col-sm-2 control-label">Full Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ old('name') }}" required>
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
                            <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}" value="{{ old('username') }}" required>
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
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ old('email') }}" required>
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
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" value="{{ old('password') }}" required>
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

                      <div class="form-group"><label class="col-sm-2 control-label">Role</label>
                          <div class="col-sm-8">
                            <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                <option value="">Choose</option>
                                @foreach ($role as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p>
                              @if ($errors->has('role'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('role') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
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
                            <input type="file" name="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid':'' }}">
                            <p>
                              @if ($errors->has('photo'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('photo') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
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
