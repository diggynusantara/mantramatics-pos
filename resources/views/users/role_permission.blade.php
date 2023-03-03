@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Role and Permission</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li class="active">
                <strong>Role and Permission</strong>
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

    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add New Permission</h5>
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

                <form role="form" action="{!! route('users.add_permission') !!}" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                        <p>
                          @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissable">
  								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  								{{ $errors->first('name') }}<a class="alert-link"></a>.
  							</div>
                          @endif
                        </p>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-outline  btn-primary">Add New</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-8">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Set Permission to Role</h5>
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

                  <form action="{{ route('users.roles_permission') }}" method="GET">
                      <div class="form-group">
                          <label for="">Roles</label>
                          <div class="input-group">
                              <select name="role" class="form-control">
                                  @foreach ($roles as $value)
                                      <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>{{ $value }}</option>
                                  @endforeach
                              </select>
                              <span class="input-group-btn">
                                  <button class="btn btn-danger">Check !</button>
                              </span>
                          </div>
                      </div>
                  </form>

                  {{-- jika $permission tidak bernilai kosong --}}
                  @if (!empty($permissions))

                  <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('PUT') }}

                      <div class="form-group">
                          <div class="nav-tabs-custom">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a href="#tab_1" data-toggle="tab">Permissions</a>
                                  </li>
                              </ul>
                              <div class="tab-content">
                                  <div class="tab-pane active" id="tab_1">
                                      <br>
                                      @php $no = 1; @endphp
                                      @foreach ($permissions as $key => $row)
                                          <div class="i-checks">
                                              <label>
                                                <input type="checkbox" name="permission[]" value="{{ $row }}"
                                                {{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}}
                                                {{ in_array($row, $hasPermission) ? 'checked':'' }}>
                                                {{ $row }}
                                              </label>
                                          </div>
                                      @endforeach
                                  </div>

                                  <br><div class="pull-left">
                                      <button class="btn btn-primary btn-sm">
                                          <i class="fa fa-send"></i> &nbsp; Set Permission
                                      </button>
                                  </div><br>

                              </div>

                          </div>
                      </div>

                  </form>

                  @endif

              </div>
          </div>
      </div>

</div>
</div>
@endsection
