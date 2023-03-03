@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Create New Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
            </li>
            <li>
                <a href="{!! route('produk.index') !!}">Products</a>
            </li>
            <li class="active">
                <strong>Create Product</strong>
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
                  <h5>Form Create New Product</h5>
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

                  <form action="{{ route('produk.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                      {{ csrf_field() }}

                      <div class="form-group"><label class="col-sm-2 control-label">Code Product</label>
                          <div class="col-sm-8">
                            <input type="text" name="code" maxlength="10" class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" value="{{ old('code') }}" required>
                            <p>
                              @if ($errors->has('code'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('code') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
                          </div>
                      </div>

                      <div class="form-group"><label class="col-sm-2 control-label">Product Name</label>
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

                      <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                          <div class="col-sm-8">
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"> {{ old('description') }} </textarea>
                            <p>
                              @if ($errors->has('description'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('description') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
                          </div>
                      </div>

                      <div class="form-group"><label class="col-sm-2 control-label">Stock</label>
                          <div class="col-sm-8">
                            <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}" value="{{ old('stock') }}" required>
                            <p>
                              @if ($errors->has('stock'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('stock') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
                          </div>
                      </div>

                      <div class="form-group"><label class="col-sm-2 control-label">Price</label>
                          <div class="col-sm-8">
                            <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" value="{{ old('price') }}" required>
                            <p>
                              @if ($errors->has('price'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					                {{ $errors->first('price') }}<a class="alert-link"></a>.
      							</div>
                              @endif
                            </p>
                          </div>
                      </div>

                      <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                          <div class="col-sm-8">
                            <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid':'' }}" required>
                                <option value="">Choose</option>
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                @endforeach
                            </select>
                            <p>
                              @if ($errors->has('category_id'))
                                <div class="alert alert-danger alert-dismissable">
      								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      								{{ $errors->first('category_id') }}<a class="alert-link"></a>.
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
                              <a href="{{ route('produk.index') }}" class="btn btn-outline btn-warning"><b>Cancel</b></a>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
      </div>

</div>
</div>
@endsection
