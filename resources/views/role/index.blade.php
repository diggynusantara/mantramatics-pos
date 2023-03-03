@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Users Manajement</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li class="active">
                <strong>Role Manajement</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-4">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Add New Role</h5>
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

                <form role="form" action="{{ route('role.store') }}" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Role</label>
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
                        <button class="btn btn-outline  btn-primary">Save</button>
                    </div>

                </form>

              </div>
          </div>
      </div>

      <div class="col-lg-8">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Role List</h5>
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

                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover dataTables-example">
                          <thead>
                              <tr>
                                  <td style="width:20px">No.</td>
                                  <td><center>Role</center></td>
                                  <td><center>Guard</center></td>
                                  <td><center>Created At</center></td>
                                  <td style="width:60px"><center>Action</center></td>
                              </tr>
                          </thead>
                          <tbody>

                              @php $no = 1; @endphp
                              @forelse ($role as $row)

                              <tr>
                                  <td><center>{{ $no++ }}</center></td>
                                  <td>{{ $row->name }}</td>
                                  <td><center>{{ $row->guard_name }}</center></td>
                                  <td><center>{{ $row->created_at }}</center></td>
                                  <td><center>
                                      <form action="{{ route('role.destroy', $row->id) }}" method="POST">

                                          {{ csrf_field() }}

                                          <input type="hidden" name="_method" value="DELETE">

                                          <button type='submit' class='btn btn-xs btn-outline btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-lg'></i></button>

                                      </form>
                                  <center></td>
                              </tr>

                              @empty

                              <tr>
                                  <td colspan="5" class="text-center">Tidak ada data</td>
                              </tr>

                              @endforelse

                          </tbody>
                      </table>
                  </div>

              </div>
          </div>
      </div>

</div>
</div>
@endsection
