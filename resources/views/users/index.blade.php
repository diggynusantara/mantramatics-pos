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
                <strong>Users Manajement</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('users.create') }}" class="btn btn-outline btn-primary"><b>Add New Users</b></a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Users List</h5>
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
                      <table class="table table-striped table-bordered table-hover dataTables-example" >
                          <thead>
                              <tr>
                                  <td style="width:20px">No.</td>
                                  <td style="width:50px"><center>Photo</center></td>
                                  <td><center>Nama</center></td>
                                  <td><center>Username</center></td>
                                  <td><center>Email</center></td>
                                  <td><center>Role</center></td>
                                  <td><center>Status</center></td>
                                  <td style="width:90px"><center>Action</center></td>
                              </tr>
                          </thead>
                          <tbody>

                              @php $no = 1; @endphp
                              @forelse ($users as $row)

                              <tr>
                                  <td><center>{{ $no++ }}</center></td>
                                  <td>
                                      <center>
                                      @if (!empty($row->photo))
                                          <img src="{{ asset('uploads/users/' . $row->photo) }}" alt="{{ $row->name }}" width="30px" height="30px" class="img-circle">
                                      @else
                                          <p>No Data Photo</p>
                                      @endif
                                      </center>
                                  </td>
                                  <td>
                                      <strong>{{ ($row->name) }}</strong>
                                  </td>
                                  <td>{{ $row->username }}</td>
                                  <td>{{ $row->email }}</td>
                                  <td><center>
                                      @foreach ($row->getRoleNames() as $role)
                                      <label for="" class="btn-xs btn-rounded btn-success">{{ $role }}</label>
                                      @endforeach
                                  </center></td>
                                  <td><center>
                                      @if ($row->status)
                                      <label class="btn-xs btn-rounded btn-primary">Active</label>
                                      @else
                                      <label class="btn-xs btn-rounded btn-warning">Suspend</label>
                                      @endif
                                  </center></td>
                                  <td>
                                      <center>
                                      <form action="{{ route('users.destroy', $row->id) }}" method="post">

                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}                                    {{-- SAMA AJA --}}
                                          {{-- <input type="hidden" name="_method" value="DELETE"> --}}   {{-- SAMA AJA --}}

                                          <a href='{{ route('users.roles', $row->id) }}'><button type='button' class='btn btn-xs btn-outline btn-warning' data-toggle='tooltip' data-placement='top' title='Change Role'><i class='fa fa-user-secret fa-lg'></i></button></a>

                                          <a href='{{ route('users.edit', $row->id) }}'><button type='button' class='btn btn-xs btn-outline btn-info' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></button></a>

                                          <button type='submit' class='btn btn-xs btn-outline btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-lg'></i></button>

                                      </form>
                                      </center>
                                  </td>
                              </tr>

                              @empty

                              <tr>
                                  <td colspan="8"class="text-center">Tidak ada data</td>
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
