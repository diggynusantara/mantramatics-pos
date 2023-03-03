@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Product Manajement</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li class="active">
                <strong>Products</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('produk.create') }}" class="btn btn-outline btn-primary"><b>Add New Product</b></a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Product List</h5>
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
                                  <td><center>Product</center></td>
                                  <td><center>Name</center></td>
                                  <td><center>Code</center></td>
                                  <td><center>Stock</center></td>
                                  <td><center>Category</center></td>
                                  <td><center>Price</center></td>
                                  <td><center>Last Update</center></td>
                                  <td  style="width:60px"><center>Action</center></td>
                              </tr>
                          </thead>
                          <tbody>

                              @php $no = 1; @endphp
                              @forelse ($products as $row)

                              <tr>
                                  <td><center>{{ $no++ }}</center></td>
                                  <td>
                                      <center>
                                      @if (!empty($row->photo))
                                          <img class="img-rounded" src="{{ asset('uploads/product/' . $row->photo) }}" alt="{{ $row->name }}" width="50px" height="50px">
                                      @else
                                          <img class="img-rounded" src="http://via.placeholder.com/50x50" alt="{{ $row->name }}">
                                      @endif
                                      </center>
                                  </td>
                                  <td>
                                      <strong>{{ ucfirst($row->name) }}</strong>
                                  </td>
                                  <td>
                                      <center><button class="btn btn-xs btn-rounded btn-outline btn-primary">{{ $row->code }}</button></center>
                                  </td>
                                  <td><center>{{ $row->stock }}</center></td>
                                  <td><center>{{ $row->category->name }}</center></td>
                                  <td><center>Rp {{ number_format($row->price) }}</center></td>
                                  <td><center>{{ $row->updated_at->diffForHumans() }}</center></td>
                                  <td>
                                      <center>
                                      <form action="{{ route('produk.destroy', $row->id) }}" method="post">

                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}

                                          <input type="hidden" name="_method" value="DELETE">

                                          <a href='{{ route('produk.edit', $row->id) }}'><button type='button' class='btn btn-xs btn-outline btn-info' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></button></a>

                                          <button type='submit' class='btn btn-xs btn-outline btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-lg'></i></button>

                                      </form>
                                      </center>
                                  </td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="9"class="text-center">Tidak ada data</td>
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
