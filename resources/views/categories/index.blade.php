@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Category Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li class="active">
                <strong>Categories</strong>
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
                  <h5>Add Category</h5>
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

                <form role="form" action="{{ route('kategori.store') }}" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Category</label>
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

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="5" rows="6" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                        <p>
                          @if ($errors->has('description'))
                            <div class="alert alert-danger alert-dismissable">
  								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  								{{ $errors->first('description') }}<a class="alert-link"></a>.
  							</div>
                          @endif
                        </p>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-outline btn-primary"><b>Save</b></button>
                    </div>

                </form>

              </div>
          </div>
      </div>

      <div class="col-lg-8">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Category List</h5>
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
                                <td><center>Category</center></td>
                                <td><center>Description</center></td>
                                <td style="width:60px"><center>Action</center></td>
                            </tr>
                        </thead>
                        <tbody>

                            @php $no = 1; @endphp
                            @forelse ($categories as $category)
                            <tr>
                                <td><center>{{ $no++ }}</center></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td><center>
                                    <form action="{{ route('kategori.destroy', $category) }}" method="post">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <input type="hidden" name="_method" value="DELETE">

                                        <a href='{!! route('kategori.edit', $category) !!}'><button type='button' class='btn btn-xs btn-outline btn-info' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></button></a>

                                        <button type='submit' class='btn btn-xs btn-outline btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-lg'></i></button>

                                    </form>
                                </center></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
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
